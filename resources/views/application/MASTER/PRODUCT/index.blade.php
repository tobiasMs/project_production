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
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Column Selectors</h5>
                                                        <span class="m-b-20">All of the data export buttons have a exportOptions option which can be used to specify information about what data should be exported and how. The options given for this parameter are passed directly to the buttons.exportData() method to obtain the required data.</span>
                                                        <span>One of the most commonly used is the columns option which defines the columns that should be used as part of the export. This is given as a column-selector, making it simple to tell it if you want only visible columns, or a mix of the columns available.</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Position</th>
                                                                        <th>Office</th>
                                                                        <th>Age</th>
                                                                        <th>Start date</th>
                                                                        <th>Salary</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Position</th>
                                                                        <th>Office</th>
                                                                        <th>Age</th>
                                                                        <th>Start date</th>
                                                                        <th>Salary</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column Selectors end -->
        <div class="card-block d-flex justify-content-center">
            <div class="card-block">
                <div class="table-responsive">
                    <table id="productTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>ID Produk</th>
                                <th>Kode 1</th>
                                <th>Kode 2</th>
                                <th>Kode 3</th>
                                <th>Kode 4</th>
                                <th>Default UOM</th>
                                <th>Lot</th>
                                <th>PO</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data will be populated by DataTables JavaScript --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
