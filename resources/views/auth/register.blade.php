@extends('layouts.front')

@section('content')
<main>
    <section class="section section-shaped section-lg">
        <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        </div>
        <div class="container pt-lg-md">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3">
                            <small>Sign up with</small>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                            <span class="btn-inner--icon">
                                <img src="{{ asset('img/icons/common/facebook.svg') }}">
                            </span>
                            <span class="btn-inner--text">Facebook</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <img src="{{ asset('img/icons/common/google.svg') }}">
                            </span>
                            <span class="btn-inner--text">Google</span>
                            </a>
                        </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Or sign up with credentials</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="custom-radio-1" class="custom-control-input" id="customRadio1" type="radio">
                                            <label class="custom-control-label" for="customRadio1">User</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-3">
                                            <input name="custom-radio-1" class="custom-control-input" id="customRadio2" checked="" type="radio">
                                            <label class="custom-control-label" for="customRadio2">Merchant</label>
                                        </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Password" type="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    {{-- <div class="text-muted font-italic">
                                        <small>password strength:
                                            <span class="text-success font-weight-700">strong</span>
                                        </small>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span>I agree with the
                                            <a href="#">Privacy Policy</a>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Create account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="{{ route('password.request') }}" class="text-light">
                        <small>Forgot password?</small>
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('login') }}" class="text-light">
                        <small>Sign in</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection
