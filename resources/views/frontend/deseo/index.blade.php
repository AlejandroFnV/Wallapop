<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/minishop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:47:34 GMT -->

<head>
  <title>Wallapop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="frontassets/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="frontassets/css/animate.css">
  <link rel="stylesheet" href="frontassets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="frontassets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="frontassets/css/magnific-popup.css">
  <link rel="stylesheet" href="frontassets/css/aos.css">
  <link rel="stylesheet" href="frontassets/css/ionicons.min.css">
  <link rel="stylesheet" href="frontassets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="frontassets/css/jquery.timepicker.css">
  <link rel="stylesheet" href="frontassets/css/flaticon.css">
  <link rel="stylesheet" href="frontassets/css/icomoon.css">
  <link rel="stylesheet" href="frontassets/css/style.css">
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
              <span class="text"><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="621b0d1710070f030b0e22070f030b0e4c010d0f">[email&#160;protected]</a></span>
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
              <a class="dropdown-item" href="{{ route('producto.create') }}">Subir producto</a>
              <a class="dropdown-item" href="{{ route('deseo.index') }}">Lista de deseos</a>
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Tu lista de deseos</h2>
          <p>Aqui tienes tus productos favoritos</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        
        <!--PRODUCTOS-->
        @foreach($productos as $producto)
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product d-flex flex-column">
            <a href="{{ url('producto/' . $producto->id) }}" class="img-prod"><img class="img-fluid" src="data:image/jpeg;base64,{{ $producto->foto }}" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>{{ $producto->categorias->categoria }}</span>
                </div>
                <!--<div class="rating">-->
                <!--  <p class="text-right mb-0">-->
                <!--    <a href="#"><span class="ion-ios-star-outline"></span></a>-->
                <!--    <a href="#"><span class="ion-ios-star-outline"></span></a>-->
                <!--    <a href="#"><span class="ion-ios-star-outline"></span></a>-->
                <!--    <a href="#"><span class="ion-ios-star-outline"></span></a>-->
                <!--    <a href="#"><span class="ion-ios-star-outline"></span></a>-->
                <!--  </p>-->
                <!--</div>-->
              </div>
              <h3><a href="#">{{ $producto->nombre }}</a></h3>
              <div class="pricing">
                <p class="price"><span>{{ $producto->precio }} €</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <!--<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>-->
                <!--<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>-->
                <a href="#" class="buy-now text-center py-2">Chat<span><i class="ion-ios-chatboxes"></i></span></a>
                @foreach($deseos as $deseo)
                @if($deseo->idproducto === $producto->id)
                <a href="{{ url('deseo/' . $deseo->id . '/delete') }}" class="buy-now text-center py-2">Borrar<span><i class="ion-ios-chatboxes"></i></span></a>
                @endif
                @endforeach
              </p>
              
              @if($user->id == $producto->idusuario)
              <span>Subido por <em>ti</em></span>
              @else
              <span>Subido por <em>{{ $producto->usuario->name }}</em></span>
              @endif
            </div>
          </div>
        </div>
        
        @endforeach
        <!--END PRODUCTOS-->
        
      </div>
    </div>
  </section>
  
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
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="026b6c646d427b6d7770666d6f636b6c2c616d6f">[email&#160;protected]</span></span></a></li>
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

  <!--<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>-->
  <script src="frontassets/js/jquery.min.js"></script>
  <script src="frontassets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="frontassets/js/popper.min.js"></script>
  <script src="frontassets/js/bootstrap.min.js"></script>
  <script src="frontassets/js/jquery.easing.1.3.js"></script>
  <script src="frontassets/js/jquery.waypoints.min.js"></script>
  <script src="frontassets/js/jquery.stellar.min.js"></script>
  <script src="frontassets/js/owl.carousel.min.js"></script>
  <script src="frontassets/js/jquery.magnific-popup.min.js"></script>
  <script src="frontassets/js/aos.js"></script>
  <script src="frontassets/js/jquery.animateNumber.min.js"></script>
  <script src="frontassets/js/bootstrap-datepicker.js"></script>
  <script src="frontassets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
  <script src="frontassets/js/google-map.js"></script>
  <script src="frontassets/js/main.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/minishop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:47:48 GMT -->

</html>