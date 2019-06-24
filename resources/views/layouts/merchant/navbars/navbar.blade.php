@auth()
    @include('layouts.merchant.navbars.navs.auth')
@endauth
    
@guest()
    @include('layouts.merchant.navbars.navs.guest')
@endguest