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
                <div class="col-lg-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Send Password Reset Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6">
                        <a href="{{ route('login') }}" class="text-light">
                          <small>Sign in</small>
                        </a>
                      </div>
                      <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                          <small>Create new account</small>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </section>
</main>
@endsection
