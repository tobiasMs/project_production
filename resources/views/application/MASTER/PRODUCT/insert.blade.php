@extends('layouts.public.app')
@section('title', 'Insert Master')
@section('content')
<div class="col-sm-12 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 700px;">
        <div class="card-header">
            <h3>Add Product</h3>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('product.index') }}" class="btn btn-primary text-white">
                    <i class="feather icon-arrow-left"></i> Back
                </a>
                <a href="{{ route('product.index') }}" class="btn btn-info text-white">
                    <i class="feather icon-upload"></i> Upload Product
                </a>
            </div>
        </div>
        <div class="card-block d-flex justify-content-center">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" style="min-width: 400px; max-width: 600px; width: 100%;">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nama Product</label>
                        <input type="text" class="form-control" id="nama_product" name="nama_product" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="product_id" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="id_product" name="id_product" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="code1" class="form-label">Code 1</label>
                        <input type="text" class="form-control" id="subcode01" name="subcode01">
                    </div>
                    <div class="col-md-6">
                        <label for="code2" class="form-label">Code 2</label>
                        <input type="text" class="form-control" id="subcode02" name="subcode02">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="code3" class="form-label">Code 3</label>
                        <input type="text" class="form-control" id="subcode03" name="subcode03">
                    </div>
                    <div class="col-md-6">
                        <label for="code4" class="form-label">Code 4</label>
                        <input type="text" class="form-control" id="subcode04" name="subcode04">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="uom" class="form-label">UoM</label>
                        <select class="form-control select2" id="uom" name="uom" style="width: 100%;">
                            <option value="">Pilih UoM</option>
                            <option value="slap">Slap</option>
                            <option value="box">Box</option>
                            <option value="pcs">Pcs</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="lot" class="form-label">Lot</label>
                        <input type="text" class="form-control" id="lot" name="lot">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="po" class="form-label">PO</label>
                        <input type="text" class="form-control" id="po" name="po">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" maxlength="200"></textarea>
                    <small class="form-text text-muted">Max 200 characters.</small>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" id="pnotify-success">ASDF Click here! <i class="icofont icofont-play-alt-2"></i></button>
                </td>
            </form>
        </div>
    </div>
</div>
        <!-- DOM/Jquery table end -->
@endsection
@push('custom_script')
        <script>
            let codeIndex = 9;
            document.getElementById('add-code-row').addEventListener('click', function() {
                if(codeIndex > 20) return; // Limit to 20 codes
                const row = document.createElement('div');
                row.className = 'row mb-3';
                row.innerHTML = `
                    <div class="col-md-3">
                        <label for="code${codeIndex}" class="form-label">Code ${codeIndex}</label>
                        <input type="text" class="form-control" id="code${codeIndex}" name="codes[]">
                    </div>
                `;
                document.getElementById('extra-codes').appendChild(row);
                codeIndex++;
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#uom').select2({
                    placeholder: "Pilih UoM",
                    allowClear: true
                });
            });
        </script>
@endpush
