<?php

namespace App\Http\Controllers\Application\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // <-- Tambahkan ini
use Illuminate\Validation\Rule; // <-- Tambahkan ini

class ProductController extends Controller
{
    //
    public function index(){
        return view('application.MASTER.PRODUCT.index');
    }

    public function data(Request $request)
{
    $perPage = $request->input('length', 50);
    $page = ($request->input('start', 0) / $perPage) + 1;

    $columns = [
        'nama_product',
        'id_product',
        'subcode01',
        'subcode02',
        'subcode03',
        'subcode04',
        'uom',
        'lot',
        'po',
        'description',
        'picture',
        'creation_date',
        'creation_user',
        'status_active'
    ];

    // --- ORDERING (fix index 0-based) ---
    $orderColumnIndex = $request->input('order.0.column', 0);
    $orderDir = $request->input('order.0.dir', 'asc');
    $orderColumn = $columns[$orderColumnIndex] ?? 'nama_product';

    // --- SEARCH (global search dari DataTables) ---
    $searchValue = $request->input('search.value');

    $query = DB::table('products')->select($columns);

    if (!empty($searchValue)) {
        $query->where(function ($q) use ($columns, $searchValue) {
            foreach ($columns as $col) {
                $q->orWhere($col, 'like', "%{$searchValue}%");
            }
        });
    }
    $query->orderBy($orderColumn, $orderDir);

    $totalFiltered = $query->count();

    $results = $query
        ->offset(($page - 1) * $perPage)
        ->limit($perPage)
        ->get();

    $totalData = DB::table('products')->count();

    return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => $totalData,
        'recordsFiltered' => $totalFiltered,
        'data' => $results,
    ]);
}



    public function tambah(Request $request){
        return view('application.MASTER.PRODUCT.insert');
    }

    public function insert(Request $request)
    {
        $data = $data = $request->all();
        Log::info('Validated data received:', $data);
        $user = auth()->user();
        $validatedData = $request->validate([
            'nama_product'        => 'required|string|max:100',
            'id_product'  => 'required|string|max:255|unique:products,id_product',
            'subcode01'       => 'required|string|max:50',
            'subcode02'       => 'required|string|max:50',
            'subcode03'       => 'required|string|max:50',
            'subcode04'       => 'required|string|max:50',
            'uom'         => 'required|string|max:20',
            'lot'         => 'required|string|max:100',
            'po'          => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'picture'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        Log::info('Validated data received:', $validatedData);
        try {
            $dataToInsert = $validatedData;
            if ($request->hasFile('picture')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
                }
                $path = $request->file('picture')->store('product', 'public');
                $dataToInsert['picture'] = 'storage/' . $path;
            }
            $dataToInsert['creation_user'] = $user->id;
            $dataToInsert['creation_date'] = date('Y-m-d H:i:s');
            DB::table('products')->insert($dataToInsert);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error inserting product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan produk. Silakan coba lagi.');
        }
    }


}
