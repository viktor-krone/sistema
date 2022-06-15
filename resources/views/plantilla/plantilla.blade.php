<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cronsoft</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--link href="page/img/favicon.png" rel="icon"-->
  <!--link href="page/img/apple-touch-icon.png" rel="apple-touch-icon"-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/owl.carousel/page/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('page/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('page/css/style.css') }}" rel="stylesheet">

  <!-- Hotjar Tracking Code for http://cronsoft.cl/ -->
    <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:1199883,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

  <!-- =======================================================
  * Template Name: Vesperr - v2.2.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div id="apitienda">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/"><span>Cronsoft</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="page/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#index.html">Home</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Equipo</a></li>
          <!--li><a href="#pricing">Precios</a></li-->
          <!--li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
        </li-->
          <li><a href="#contact">Contacto</a></li>

          <li class="get-started"><a href="{{ asset('/login') }}">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


@yield('contenido')




  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Cronsoft</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">Nosotros</a>
            <a href="#">Politicas de privacidad</a>
            <a href="#">Terminos de uso</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</div>
<!-- Vendor JS Files -->
<script src="{{ asset('page/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('page/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('page/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('page/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('page/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('page/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('page/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('page/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('page/vendor/aos/aos.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--

-->

<!-- Template Main JS File -->
<script src="{{ asset('page/js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
