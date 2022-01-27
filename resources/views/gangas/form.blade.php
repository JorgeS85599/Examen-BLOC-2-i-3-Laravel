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

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        @if(isset($ganga))
            <form method="POST" action="{{route('ganga.update',$ganga->id)}}" enctype="multipart/form-data">
                <h2>Editando</h2>
                @method('PUT')
                @else
                    <form method="POST" action="{{route('ganga.store')}}" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <?php if (isset($ganga->id)): ?>
                        <div class="form-group">
                            <label for="name">Id:<?= $ganga->id ?></label>
                            <input name="id" type="hidden" value="<?= $ganga->id ?>">
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="name">Título:</label>
                            <input name="title" type="text" class="form-control " id="title"
                                   aria-describedby="titleHelp" placeholder="Enter Title"
                                   value="{{old('title')??(isset($ganga)?$ganga->title:'')}}">
                            <small id="nameHelp" class="form-text text-muted">El título</small>
                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="name">Descripción:</label>
                            <input name="description" type="text" class="form-control " id="description"
                                   aria-describedby="titleHelp" placeholder="Enter Description"
                                   value="{{old('description')??(isset($ganga)?$ganga->description:'')}}">
                            <small id="nameHelp" class="form-text text-muted">Descripción</small>
                            @if ($errors->has('description'))
                                <div class="text-danger">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="name">Url:</label>
                            <input name="url" type="text" class="form-control " id="url"
                                   aria-describedby="urlHelp" placeholder="Enter Url"
                                   value="{{old('url')??(isset($ganga)?$ganga->url:'')}}">
                            <small id="nameHelp" class="form-text text-muted">Url</small>
                            @if ($errors->has('url'))
                                <div class="text-danger">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="dprice">Discount Price:</label>
                            <input name="dprice" type="number" step="0.1" class="form-control " id="dprice"
                                   aria-describedby="dpriceHelp" placeholder="Enter Discount Price"
                                   value="{{old('dprice')??(isset($ganga)?$ganga->discount_price:'')}}">
                            <small id="dPriceHelp" class="form-text text-muted">Discount Price.</small>

                        </div>
                        @if ($errors->has('dprice'))
                            <div class="text-danger">
                                {{ $errors->first('dprice') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="price">Original Price:</label>
                            <input name="price" type="number" step="0.1" class="form-control " id="price"
                                   aria-describedby="priceHelp" placeholder="Enter Original Price"
                                   value="{{old('price')??(isset($ganga)?$ganga->price:'')}}">
                            <small id="priceHelp" class="form-text text-muted">Original Price.</small>
                        </div>
                        @if ($errors->has('price'))
                            <div class="text-danger">
                                {{ $errors->first('price') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="points">Points:</label>
                            <input name="points" type="number" class="form-control " id="points"
                                   aria-describedby="pointsHelp" placeholder="Enter Points"
                                   value="{{old('points')??(isset($ganga)?$ganga->points:'')}}">
                            <small id="pointsHelp" class="form-text text-muted">Points</small>
                        </div>
                        @if ($errors->has('points'))
                            <div class="text-danger">
                                {{ $errors->first('points') }}
                            </div>
                        @endif

                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}" @isset($ganga) {{$category->id== $ganga->id_category?'selected':''}} @endisset >   {{ $category->title}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <div class="text-danger">
                                {{ $errors->first('category') }}
                            </div>
                        @endif
                        </br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
    </div>
</section>

@include('partials.footer')
</body>
</html>
