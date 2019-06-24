@extends('layouts.admin.app', ['title' => __('User Profile')])

@section('content')
    @include('layouts.admin.products.partials.header', [
        'title' => __('')
    ])

    <div class="container-fluid mt--7">
        <div class="row">
        </div>
        
        @include('layouts.merchant.footers.auth')
    </div>
@endsection