<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ route('front.home') }}">
        <h3 class="text-white">{{ config('app.name', 'Laravel') }}</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
            <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{ route('front.home') }}">
                <img src="{{ asset('img/brand/blue.png') }}">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                </button>
            </div>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                    <i class="ni ni-ui-04 d-lg-none"></i>
                    <span class="nav-link-inner--text">What you want</span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl">
                    <div class="dropdown-menu-inner">
                        <a href="{{ route('front.view-categories') }}" class="media d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                            <i class="ni ni-spaceship"></i>
                            </div>
                            <div class="media-body ml-3">
                            <h6 class="heading text-primary mb-md-1">View All Categories</h6>
                            <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon compiling Scss, change brand colors and more.</p>
                            </div>
                        </a>
                        <a href="{{ route('front.view-products') }}" class="media d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                            <i class="ni ni-palette"></i>
                            </div>
                            <div class="media-body ml-3">
                            <h6 class="heading text-primary mb-md-1">View All Products</h6>
                            <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for Argon.</p>
                            </div>
                        </a>
                        <a href="{{ route('front.view-merchants') }}" class="media d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                            <i class="ni ni-ui-04"></i>
                            </div>
                            <div class="media-body ml-3">
                            <h5 class="heading text-warning mb-md-1">View All Merchants</h5>
                            <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Categories</span>
                </a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Computer & Electronics</a>
                    <a href="" class="dropdown-item">Health, Beauty & Fitness</a>
                    <a href="" class="dropdown-item">Jewelry & Watches</a>
                    <a href="" class="dropdown-item">Marketplaces</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="https://www.facebook.com" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                    <i class="fa fa-facebook-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Facebook</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="https://www.instagram.com" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                    <i class="fa fa-instagram"></i>
                    <span class="nav-link-inner--text d-lg-none">Instagram</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="https://twitter.com" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                    <i class="fa fa-twitter-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Twitter</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('img/theme/team-4-800x800.jpg') }}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('merchant.front') }}" class="dropdown-item">My Account</a>
                    <a href="{{ route('logout') }}" class="dropdown-item">Log out</a>
                </div>
            </li>
        </ul>
        </div>
    </div>
</nav>