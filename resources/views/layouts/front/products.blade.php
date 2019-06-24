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
                                <h1 class="display-3 text-white">{{ __('Browse products') }}</h1>
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
            <div class="container d-flex">
                <div class="row">
                    <div class="col">
                        <div class="row row-grid align-items-center">
                            @foreach ($products as $product)
                                <div class="col-lg-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $product->image_link }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->title }}</h5>
                                            <p class="card-text">{{ $product->adwords_labels }}</p>
                                            <a href="{{ $product->link }}" target="_blank" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-lg-md">
                <nav class="d-flex justify-content-end align-items-center" aria-label="...">
                    {{ $products->links() }}
                </nav>
            </div>
        </section>
    </main>
@endsection