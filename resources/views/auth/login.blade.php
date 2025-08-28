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
                    <div class="form-group form-primary">
                        <input type="text" id="name" name="name" class="form-control" required placeholder="Username"> <!-- Ubah name="text" ke name="email" -->
                        <span class="form-bar"></span>
                    </div>
                    <div class="form-group form-primary">
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
                        <span class="form-bar"></span>
                    </div>
                    <div class="row m-t-25 text-left">
                        <div class="col-12">
                            <div class="checkbox-fade fade-in-primary d-">
                                <label>
                                    <input type="checkbox" name="remember"> <!-- Tambahkan remember me -->
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                    <span class="text-inverse">Remember me</span>
                                </label>
                            </div>
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
                            <h3 class="text-center">Sign In</h3>
                            <h3 class="text-center">{{ now()->format('H:i:s') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end of form -->
    </div>
    <!-- end of col-sm-12 -->
@endsection
