<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Ganga Severa</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="/css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="/css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/responsive.css">


</head>
<body class="js">

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- End Preloader -->


<!-- Header -->
<header class="header shop">
    @include('partials.topbar')
    @include('partials.headerinner')
</header>

@include('partials.sliderarea')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h1>Ganga {{ $gang->id}}</h1>
        <table class="table table-striped table-hover">
            <thead class="thead-dark bg-primary">
                <tr>
                    <th>Id</th>
                    <th>T??tulo</th>
                    <th>Descripci??n</th>
                    <th>Url</th>
                    <th>Categor??a</th>
                    <th>Puntos</th>
                    <th>Precio</th>
                    <th>Precio de descuento</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$gang->id}}</td>
                    <td>{{$gang->title}}</td>
                    <td>{{$gang->description}}</td>
                    <td>{{$gang->url}}</td>
                    <td>{{$gang->category->title}}</td>
                    <td>{{$gang->points}}</td>
                    <td>{{$gang->price}}</td>
                    <td>{{$gang->discount_price}}</td>
                    <td>{{$gang->available}}</td>
                    <td>
                        @if(Auth::user() && Auth::user()->admin == '1')
                        <form action="{{ route('ganga.destroy', $gang) }}" method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button class="ti-trash"></button>
                        </form>
                        <a href="{{route('ganga.edit',$gang)}}"><i class="ti-pencil"></i></a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@include('partials.footer')
</body>
</html>
