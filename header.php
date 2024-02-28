<?php
session_name('N3wKt@10go');
session_start();
if ($_SESSION) {
    echo '<input type="hidden" id="session" name="session" value="activa">';
} else {
    echo '<input type="hidden" id="session" name="session" value="desactiva">';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>.::Grupo Confisur::. || .::Catalogo::.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="src/assets/img/favicon.png" rel="icon">
  <link href="src/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="src/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="src/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="src/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="src/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="src/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="src/assets/css/main.css" rel="stylesheet">

  <script src="src/assets/js/jquery-3.7.0.min.js"></script>
  
  <link href="src/assets/multiselector/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  <script src="src/assets/multiselector/js/jquery.multi-select.js" type="text/javascript"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div id="title">
        <a href="./" class="logo d-flex align-items-center  me-auto me-lg-0">
          <img src="src/assets/img/company/mr.png" alt="">
          <h1>PhotoFolio</h1>
          <i class="bi bi-shop-window"></i>
        </a>
      </div>

      <?php
      if (!isset($_SESSION['login'])) {
      ?>
      <div class="header-social-links">
        <button id="btnlogin" type="button" class="btn btn-secondary" data-toggle="modal"><i class="bi bi-fingerprint"></i></button>
      </div>
      <?php
      } else {
      ?>
      <nav id="navbar" class="navbar">
        <ul id="menu">
          <li><a data-option="Home" href="index.html">Home</a></li>
          <?php if ($_SESSION['type']==1) { ?>
          <li><a data-option="Usuarios" href="contact.html">Usuarios</a></li>
          <li><a data-option="Productos" href="about.html">Productos</a></li>
          <li><a data-option="Marcas" href="services.html">Marcas</a></li>
          <li><a data-option="Auditoria" href="services.html">Auditoria</a></li>
          <?php } ?>
          <?php if ($_SESSION['type'] == 2||$_SESSION['type'] == 1) { ?>
          <li><a data-option="Descarga" href="contact.html">Descarga</a></li>
          <?php } ?>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <button id="signoff" type="button" class="btn btn-danger" data-toggle="modal"><i class="bi bi-fingerprint"></i></button>
      </div>
      <?php
      }
      ?>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      

 

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <br>
          <h2>Somos <span>Grupo Confisur</span> la red más grande de confitería en todo el país</h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
  

  <main id="main" data-aos="fade" data-aos-delay="1500">