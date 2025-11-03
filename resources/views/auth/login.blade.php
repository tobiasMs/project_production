@extends('layouts.auth.app')
@section('auth-title', 'LOGIN')

@section('content')
    <div class="col-sm-12">
        <!-- Authentication card start -->
        <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
            @csrf <!-- Tambahkan CSRF token -->
            <div class="text-center">
                <img src="{{ asset('files/assets/images/logo.png') }}" alt="logo.png">
            </div>
            <div class="auth-box card">
                <div class="card-block">
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <h3 class="text-center">Sign In</h3>
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger text-center mt-3" id="login-error-alert">{{ session('error') }}</div>
                    @endif
                    <div class="form-group form-primary">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Username"> <!-- Ubah name="text" ke name="email" -->
                        <span class="form-bar"></span>
                    </div>
                    <div class="form-group form-primary">
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
                        <span class="form-bar"></span>
                    </div>
                    <div class="row m-t-25 text-left">
                        <div class="col-12">
                            <div class="mt-3 text-center">
                                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button> <!-- Ubah type="button" ke type="submit" -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center" id="live-clock"></h3>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <!-- end of form -->
    </div>
    @if(session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                <p class="mt-3 mb-0">{{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('successModal'));
                modal.show();
            });
        </script>
        @endif
    <!-- end of col-sm-12 -->
@endsection
@push('auth-scripts')
    <script>
        // Hilangkan alert setelah 3 detik dengan efek fade out
        setTimeout(() => {
            const alertBox = document.getElementById('login-error-alert');
            if (alertBox) {
                alertBox.style.transition = 'opacity 0.5s ease';
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 500); // Hapus elemen setelah fade
            }
        }, 3000);
    </script>
   <script>
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-GB', { hour12: false });
            document.getElementById('live-clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endpush
