<?php

namespace App\Http\Controllers\Application\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        return view('application.MASTER.PRODUCT.index');
    }

    public function data(Request $request){
        $query = DB::connection('mysql')
            ->table('tbl_produk')
            ->select('nama', 'id_produk', 'creation', 'creation_user');
        return response()->json($query);
    }
}
