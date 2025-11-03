@extends('layouts.public.app')
@section('title', 'Insert Master')
@section('content')
<div class="col-sm-12 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 700px;">
        <div class="card-header">
            <h3>Upload Product</h3>
            <div class="d-flex">
                <a
                href="{{ route('product.index') }}"
                class="btn btn-primary"
                style="color: #fff;">
                    <i class="feather icon-arrow-left"></i> Back
                </a>
            </div>
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
