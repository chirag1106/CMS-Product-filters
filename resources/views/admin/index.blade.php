@extends('app')
@section('login-admin')
    <div>
        <div class="container d-flex align-items-center">
            <div class="container-fluid p-0 m-0">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 p-0 m-0">
                        <div class="p-5">
                            <img src="{{ asset('/img/login.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-light ms-auto me-auto rounded-3 shadow-lg">
                        <form class="row p-4 " action="{{ route('AdminLogin') }}" method="post">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            @csrf
                            <div class="col-md-12 mb-5">
                                <h5 class="display-6 text-primary text-center fw-normal">Admin Login</h5>
                            </div>
                            <div class="col-md-12 mb-5 text-center rounded-circle">
                                <img src="{{ asset('/img/login2.png') }}" style="height:90px;" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="col-md-12 mb-5">
                                <label for="inputEmail4" class="form-label ps-1">Username or Email</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-at"></i>
                                    </div>
                                    <input type="email" class="form-control" id="inputEmail4" name="email"
                                        value="{{ old('email') }}">
                                </div>
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 mb-5">
                                <label for="inputEmail4" class="form-label ps-1">Password</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-key"></i>
                                    </div>
                                    <input type="password" class="form-control" id="inputPassword" name="password"
                                        value="{{ old('password') }}">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="login" class="btn col-md-12 btn-primary">Login</button>
                            </div>
                            <div class="col-6 w-100 text-end ">
                                <a id="forgpt" href="{{ url('') }}/forgot" class="text-decoration-none">
                                    <span class="">Forgot Password?</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @endsection
