<!-- Topbar -->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i>{{config('menu')['tlf']}}</li>
                        <li><i class="ti-email"></i>{{config('menu')['email']}}</li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        <li><i class="ti-location-pin"></i>Store location</li>
                        <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                        <li><i class="ti-user"></i> <a href="#">My account</a></li>
                        <li>
                            @if (Auth::user())
                                <i class="ti-power-off"></i><a href="logout">Logout {{Auth::user()->name}}</a>
                            @else
                                <i class="ti-power-off"></i><a href="login">Login</a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->
