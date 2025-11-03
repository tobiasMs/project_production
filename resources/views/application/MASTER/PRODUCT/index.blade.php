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
                <table id="product-table" class="table table-striped table-bordered nowrap">
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
$(document).ready(function () {
    $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('product.data') }}",
            type: "GET",
            dataSrc: "data"
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                orderable: false,
                className: "text-center"
            },
            {
                data: 'picture',
                render: function (data) {
                    if (data) {
                        return `<img src="/${data}" width="80" height="80" style="object-fit:cover; border-radius:6px"/>`;
                    }
                    return '-';
                },
                orderable: false,
                searchable: false,
                className: "text-center"
            },
            { data: 'nama_product', name: 'nama_product' },
            { data: 'id_product', name: 'id_product' },
            { data: 'subcode01', name: 'subcode01' },
            { data: 'subcode02', name: 'subcode02' },
            { data: 'subcode03', name: 'subcode03' },
            { data: 'subcode04', name: 'subcode04' },
            { data: 'uom', name: 'uom' },
            { data: 'lot', name: 'lot' },
            { data: 'po', name: 'po' },
            { data: 'description', name: 'description' },
            {
                data: 'status_active',
                render: function (data) {
                    return data == 1
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-secondary">Inactive</span>';
                },
                className: "text-center"
            }
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-copy"></i> Copy',
                exportOptions: { columns: [0, ':visible'] }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel"></i> Excel',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf"></i> PDF',
                exportOptions: { columns: [0, 1, 2, 5] }
            },
            'colvis'
        ],
        order: [[2, 'asc']],
        responsive: true
    });
});
</script>


@endpush
