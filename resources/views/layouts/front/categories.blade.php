@extends('layouts.front')

@section('content')
    <main>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section section-lg section-shaped">
                <div class="shape shape-style-1 bg-gradient-default">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="container py-lg-md d-flex">
                    <div class="col px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="display-3 text-white">{{ __('Browse products by category') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SVG separator -->
                <div class="separator separator-bottom separator-skew">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </section>
            <!-- 1st Hero Variation -->
        </div>
        <section class="section section-lg">
            <div class="container py-lg-md d-flex">
                <div class="row row-grid align-items-center">
                    @foreach ($cates as $cate)
                        <div class="col-lg-4">
                            <a href="{{ route('front.view-products.category', $cate) }}"><p class="display-5 text-default">{{$cate->name}}</p></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection