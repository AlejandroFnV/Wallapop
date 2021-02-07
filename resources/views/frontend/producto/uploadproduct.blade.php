<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/minishop/product-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:47:55 GMT -->

<head>
    <title>Wallapop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../frontassets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../frontassets/css/animate.css">
    <link rel="stylesheet" href="../frontassets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../frontassets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../frontassets/css/magnific-popup.css">
    <link rel="stylesheet" href="../frontassets/css/aos.css">
    <link rel="stylesheet" href="../frontassets/css/ionicons.min.css">
    <link rel="stylesheet" href="../frontassets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../frontassets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../frontassets/css/flaticon.css">
    <link rel="stylesheet" href="../frontassets/css/icomoon.css">
    <link rel="stylesheet" href="../frontassets/css/style.css">
</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text"><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2950465c5b4c44484045694c44484045074a4644">[email&#160;protected]</a></span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Wallapop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>-->
                    <!--<li class="nav-item dropdown">-->
                    <!--  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>-->
                    <!--  <div class="dropdown-menu" aria-labelledby="dropdown04">-->
                    <!--    <a class="dropdown-item" href="shop.html">Shop</a>-->
                    <!--    <a class="dropdown-item" href="product-single.html">Single Product</a>-->
                    <!--    <a class="dropdown-item" href="cart.html">Cart</a>-->
                    <!--    <a class="dropdown-item" href="checkout.html">Checkout</a>-->
                    <!--  </div>-->
                    <!--</li>-->
                    <!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>-->
                    <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
                    <!--<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
                    <!--<li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>-->
                    @guest
                    <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item active"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endguest

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $user->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            @if($user->name === 'alejandro')
                            <a class="dropdown-item" href="{{ route('backend.main') }}">Backend</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-wrap hero-bread" style="background-image: url('../frontassets/images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                    <h1 class="mb-0 bread">Añade un producto</h1>
                </div>
            </div>
        </div>
    </div>



    <div class="row block-9">
        <div class="col-md-12 order-md-last d-flex">
            <form action="{{ url('producto') }}" method="post" enctype="multipart/form-data" class="bg-white p-5 contact-form">
                @csrf
                
                <input type="hidden" class="form-control" id="idusuario" name="idusuario" value="{{ $user->id }}">
                <!--<input type="" class="form-control" id="idcategoria " name="idcategoria ">-->
                
                <div class="form-group">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
                </div>
                
                <div class="form-group">
                    <label for="idcategoria">Categoria</label>
                    
                    @if(isset($categorias))
                    <select name="idcategoria" id="idcategoria" required class="form-control">
                        <option value="" disabled selected>Selecciona una categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                    @else
                        {{ $categoria->categoria }}
                        <input type="hidden" id="idcategoria" name="idcategoria" value="{{ $categoria->id }}"/>
                    @endif
                    
                </div>
                
                <!--<div class="form-group">-->
                <!--    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Categoría">-->
                <!--</div>-->
                
                <div class="form-group">
                    <input type="text" class="form-control" id="uso" name="uso" placeholder="Uso">
                </div>
                
                <div class="form-group">
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
                </div>
                
                <div class="form-group">
                    <textarea cols="30" rows="7" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                </div>
                
                <div class="form-group">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                </div>
                
                <div class="form-group">
                    <input type="hidden" class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d') }}">
                </div>
                
                <!--<div class="form-group">-->
                <!--    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">-->
                <!--</div>-->
                
                <div class="form-group">
                    <label for="estado">Estado</label>
                    
                    <select name="estado" id="estado" required class="form-control">
                        <option value="" disabled selected>Estado</option>
                        <option value="En venta">En venta</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Retirado">Retirado</option>
                        <option value="Censurado">Censurado</option>
                        
                        <!--<option {{--old('job_status',$profile->job_status)=="unemployed"? 'selected':''--}}  value="unemployed">Unemployed</option>-->
                    </select>
                    
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Subir producto" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>
    </div>




    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Wallapop</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="0e676068614e77617b7c6a61636f6760206d6163">[email&#160;protected]</span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;
                        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

                    </p>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
    <script src="../frontassets/js/jquery.min.js"></script>
    <script src="../frontassets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../frontassets/js/popper.min.js"></script>
    <script src="../frontassets/js/bootstrap.min.js"></script>
    <script src="../frontassets/js/jquery.easing.1.3.js"></script>
    <script src="../frontassets/js/jquery.waypoints.min.js"></script>
    <script src="../frontassets/js/jquery.stellar.min.js"></script>
    <script src="../frontassets/js/owl.carousel.min.js"></script>
    <script src="../frontassets/js/jquery.magnific-popup.min.js"></script>
    <script src="../frontassets/js/aos.js"></script>
    <script src="../frontassets/js/jquery.animateNumber.min.js"></script>
    <script src="../frontassets/js/bootstrap-datepicker.js"></script>
    <script src="../frontassets/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
    <script src="../frontassets/js/google-map.js"></script>
    <script src="../frontassets/js/main.js"></script>
    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/minishop/product-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:47:55 GMT -->

</html>