@extends('layouts.admin.app', ['title' => __('Business Management')])

@section('content')
    @include('layouts.admin.products.partials.header', ['title' => __('Add Category URL')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Business Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.categories') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.categories.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Google Product Category') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck1" type="checkbox" name="ignore_first" checked=true>
                                        <label class="custom-control-label" for="customCheck1">Ignore First Line</label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-url">{{ __('New Url') }} (Default: https://www.google.com/basepages/producttype/taxonomy.en-US.txt)</label>
                                    <input type="text" name="url" id="input-url" class="form-control form-control-alternative{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('Url') }}" value="{{ old('url') }}" required autofocus>

                                    @if ($errors->has('url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.admin.footers.auth')
    </div>
@endsection