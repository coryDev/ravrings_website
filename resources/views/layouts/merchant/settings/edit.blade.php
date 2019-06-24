@extends('layouts.merchant.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.merchant.products.partials.header', [
        'title' => __('')
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('img/theme/team-4-800x800.jpg') }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn mb-3 btn-sm btn-info">{{ __('Change Logo') }}</button>
                            <button type="button" class="btn mb-3 btn-sm btn-default float-right" data-toggle="modal" data-target="#modal-notification">{{ __('Operation Hours') }}</button>
                        </div>
                    </div>
                    <div class="card-body pt-8 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Products') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Customers') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Visits') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $merchant->company_name }}<span class="font-weight-light">, <a href="tel:{{ $merchant->phone }}">{{ $merchant->phone }}</a></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $merchant->city }} {{ $merchant->state }} {{ $merchant->country }}
                            </div>
                            <div class="h5 mt-4">
                                {{-- <i class="ni business_briefcase-24 mr-2"></i>{{ $merchant->opening_hours }} --}}
                            </div>
                            <div class="row">
                                <div class="col">1</div>
                                <div class="col">2</div>
                                <div class="col">3</div>
                                <div class="col">4</div>   
                            </div>
                            <hr class="my-4" />
                            <p>{{ $merchant->overview }}</p>
                            <a href="{{ $merchant->web_url }}" target="_blank">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-2">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-briefcase-24 mr-2"></i>{{ __('Business info') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-pin-3 mr-2"></i>{{ __('Location') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-delivery-fast mr-2"></i>{{ __('Feed Settings') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <form method="post" action="{{ route('merchant.settings.update') }}" autocomplete="off">
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('My Business information') }}</h6>

                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-company">{{ __('Legal Company Name') }}</label>

                                            <input type="text" name="company_name" id="input-company" class="form-control form-control-alternative{{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Legal Company Name') }}" value="{{ old('company_name', $merchant->company_name) }}" required autofocus>

                                            @if ($errors->has('company_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('company_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group{{ $errors->has('overview') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-overview">{{ __('Overview') }}</label>
                                            <textarea name="overview" id="input-overview" class="form-control form-control-alternative{{ $errors->has('overview') ? ' is-invalid' : '' }}" placeholder="{{ __('Overview') }}">{{ old('overview', $merchant->overview) }}</textarea>

                                            @if ($errors->has('overview'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('overview') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('web_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-web_url">{{ __('Website Url') }}</label>
                                            <input type="url" name="web_url" id="input-web_url" class="form-control form-control-alternative{{ $errors->has('web_url') ? ' is-invalid' : '' }}" placeholder="{{ __('Website Url') }}" value="{{ old('web_url', $merchant->web_url) }}" required>

                                            @if ($errors->has('web_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('web_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('facebook_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-facebook_url">{{ __('Facebook Url') }}</label>
                                            <input type="url" name="facebook_url" id="input-facebook_url" class="form-control form-control-alternative{{ $errors->has('facebook_url') ? ' is-invalid' : '' }}" placeholder="{{ __('Facebook Url') }}" value="{{ old('facebook_url', $merchant->facebook_url) }}">

                                            @if ($errors->has('facebook_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('facebook_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('twitter_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-twitter_url">{{ __('Twitter Url') }}</label>
                                            <input type="url" name="twitter_url" id="input-twitter_url" class="form-control form-control-alternative{{ $errors->has('twitter_url') ? ' is-invalid' : '' }}" placeholder="{{ __('Twitter Url') }}" value="{{ old('twitter_url', $merchant->twitter_url) }}">

                                            @if ($errors->has('twitter_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('twitter_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('google_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-google_url">{{ __('Google Url') }}</label>
                                            <input type="url" name="google_url" id="input-google_url" class="form-control form-control-alternative{{ $errors->has('google_url') ? ' is-invalid' : '' }}" placeholder="{{ __('Google Url') }}" value="{{ old('google_url', $merchant->google_url) }}">

                                            @if ($errors->has('google_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('google_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('pinterest_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-pinterest_url">{{ __('Pinterest Url') }}</label>
                                            <input type="url" name="pinterest_url" id="input-pinterest_url" class="form-control form-control-alternative{{ $errors->has('pinterest_url') ? ' is-invalid' : '' }}" placeholder="{{ __('Pinterest Url') }}" value="{{ old('pinterest_url', $merchant->pinterest_url) }}">

                                            @if ($errors->has('pinterest_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('pinterest_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <form method="post" action="{{ route('merchant.settings.update') }}" autocomplete="off">
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('Location') }}</h6>

                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{ old('country', $merchant->country) }}" required autofocus>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-state">{{ __('State') }}</label>
                                            <input type="text" name="state" id="input-state" class="form-control form-control-alternative{{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="{{ __('State') }}" value="{{ old('state', $merchant->state) }}" required>

                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-city">{{ __('City') }}</label>
                                            <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ old('name', $merchant->city) }}" required>

                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                            <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address', $merchant->address) }}" required>

                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
                                            <input type="tel" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone', $merchant->phone) }}" required>

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('zip') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-zip">{{ __('Zip Code') }}</label>
                                            <input type="number" name="zip" id="input-zip" class="form-control form-control-alternative{{ $errors->has('zip') ? ' is-invalid' : '' }}" placeholder="{{ __('Zip Code') }}" value="{{ old('zip', $merchant->zip) }}" required>

                                            @if ($errors->has('zip'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('zip') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                <form method="post" action="{{ route('merchant.settings.update') }}" autocomplete="off">
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('Feed settings') }}</h6>

                                    <div class="pl-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-option">{{ __('Feed Option') }}</label>
                                            <select name="update_id" id="input-option" class="form-control form-control-alternative" required>
                                                <option class="form-control" value="1">Regular full upload</option>
                                                <option class="form-control" value="2">Regular update upload</option>
                                                <option class="form-control" value="3">Fetch Upload</option>
                                            </select>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('feed_url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="feed_url">{{ __('Url') }}</label>
                                            <input type="url" name="feed_url" id="feed_url" class="form-control form-control-alternative" placeholder="{{ __('Products Feed Url') }}" value="https://www.skullcap.com/datafiles/skullcap.txt" required>

                                            @if ($errors->has('feed_url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('feed_url') }}</strong>
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
            </div>
        </div>

        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">You should read this!</h4>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white">Ok, Got it</button>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
                    </div>
                    
                </div>
            </div>
        </div>
        
        @include('layouts.merchant.footers.auth')
    </div>
@endsection