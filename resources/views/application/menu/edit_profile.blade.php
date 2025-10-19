@extends('layouts.public.app')
@section('title', 'Profile')
@section('content')
    <div class="col-sm-12">
        <!-- Basic Inputs Validation start -->
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Profile Edit</h3>
            </div>
            <div class="card-block">
                <form id="profileForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Lengkap" maxlength="40">
                            <span class="messages" id="nameError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password baru">
                            <span class="messages" id="passwordError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                placeholder="Konfirmasi Password">
                            <span class="messages" id="passwordConfirmationError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" readonly>
                            <span class="messages" id="emailError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto Profile</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="profile" name="profile">
                            <img id="profilePreview" src="" alt="Profile" width="180" style="display:none; margin-top:10px;">
                            <span class="messages" id="profileError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic Inputs Validation end -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch("{{ route('profile.show') }}", {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('name').value = data.full_name || '';
                document.getElementById('email').value = data.email || '';
                if (data.profile) {
                    const img = document.getElementById('profilePreview');
                    img.src = "{{ asset('') }}" + data.profile;
                    img.style.display = 'block';
                }
            });

            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                fetch("{{ route('profile.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    ['nameError','passwordError','passwordConfirmationError','emailError','profileError'].forEach(id => {
                        document.getElementById(id).innerText = '';
                    });
                    if (data.errors) {
                        if (data.errors.name) document.getElementById('nameError').innerText = data.errors.name[0];
                        if (data.errors.password) document.getElementById('passwordError').innerText = data.errors.password[0];
                        if (data.errors.password_confirmation) document.getElementById('passwordConfirmationError').innerText = data.errors.password_confirmation[0];
                        if (data.errors.email) document.getElementById('emailError').innerText = data.errors.email[0];
                        if (data.errors.profile) document.getElementById('profileError').innerText = data.errors.profile[0];
                    } else {
                        alert('Profile updated successfully!');
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
