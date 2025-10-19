@extends('layouts.public.app')
@section('title', 'Insert Master')

@section('content')
<div class="col-sm-12 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card">
        <div class="card-header">
            <h3>Add Product</h3>
            <div class="d-flex">
                <a
                href="{{ route('product.add') }}"
                class="btn btn-primary"
                style="color: #fff;">
                    <i class="feather icon-plus"></i> Add Master Product
                </a>
            </div>
        </div>
        <!-- Column Selectors table start -->
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="cbtn-selectors" class="table table-striped table-bordered nowrap productTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Code 1</th>
                            <th>Code 2</th>
                            <th>Code 3</th>
                            <th>Code 4</th>
                            <th>UoM</th>
                            <th>Lot</th>
                            <th>PO</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Code 1</th>
                            <th>Code 2</th>
                            <th>Code 3</th>
                            <th>Code 4</th>
                            <th>UoM</th>
                            <th>Lot</th>
                            <th>PO</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- Column Selectors end -->
    </div>
</div>
        <!-- DOM/Jquery table end -->
    @endsection
@push('custom_script')
<script>
           $(function() {
            $('#productTable').DataTable({
                //
                // === PERUBAHAN DIMULAI DI SINI ===
                //
                processing: true, // Menampilkan indikator loading
                serverSide: false, // Set ke false jika data dimuat sekaligus. Set true jika menggunakan pagination server-side.

                // 1. Menggunakan AJAX untuk mengambil data dari route 'data'
                ajax: '{{ route('product.data') }}',

                // 2. Mendefinisikan kolom sesuai dengan nama kolom dari database
                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + 1; // Penomoran otomatis
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'picture', // diganti dari 'gambar_produk'
                        render: function(data) {
                            // Jika ada gambar, tampilkan. Jika tidak, tampilkan placeholder.
                            const imageUrl = data ? `{{ asset('') }}${data}` : 'https://placehold.co/100x100/EBF4FA/313131?text=No+Image';
                            return `<img src="${imageUrl}" alt="Gambar Produk" width="100" class="img-thumbnail">`;
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'nama_product' },
                    { data: 'id_product' },
                    { data: 'subcode01' },
                    { data: 'subcode02' },
                    { data: 'subcode03' },
                    { data: 'subcode04' },
                    { data: 'uom' },
                    { data: 'lot' },
                    { data: 'po' },
                    { data: 'description' },
                    {
                        data: 'status_active',
                        render: function(data) {
                            if (data === 'Aktif' || data === 1 || data === '1') { // Cek beberapa kemungkinan nilai 'Aktif'
                                return '<span class="badge bg-success">Aktif</span>';
                            } else {
                                return '<span class="badge bg-danger">Tidak Aktif</span>';
                            }
                        }
                    }
                ],
                responsive: true,
                layout: {
                    topStart: {
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                text: 'Cetak Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Cetak PDF',
                                className: 'btn btn-danger'
                            }
                        ]
                    }
                },
            });
        });
        </script>

@endpush
