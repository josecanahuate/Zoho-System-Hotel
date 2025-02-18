<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo TITLE . '  ' . $data['title'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css"
  href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

<link rel="stylesheet" href="../assets/principal/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/principal/css/animate.css">
<link rel="stylesheet" href="../assets/principal/css/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/principal/css/aos.css">
<link rel="stylesheet" href="../assets/principal/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="../assets/principal/css/jquery.timepicker.css">
<link rel="stylesheet" href="../assets/principal/css/fancybox.min.css">

<link rel="stylesheet" href="../assets/principal/fonts/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="../assets/principal/fonts/fontawesome/css/font-awesome.min.css">

<!-- Theme Style -->
<link rel="stylesheet" href="../assets/principal/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script src="../assets/principal/js/index.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const fecha_llegada = document.querySelector("#fecha_llegada");
    const fecha_salida = document.querySelector("#fecha_salida");
    const habitacion = document.querySelector("#habitacion");
    const base_url = "http://reservas.test/"; // Asegúrate de definir correctamente la base_url

    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: "dayGridMonth",
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
      },
      locale: "es",
      navLinks: true,
      businessHours: true,
      editable: true,
      selectable: true,
      events: function (fetchInfo, successCallback, failureCallback) {
        // Obtener los valores de los inputs en el momento en que se carga el calendario
        const llegada = fecha_llegada.value || "default"; // Valor por defecto si está vacío
        const salida = fecha_salida.value || "default";
        const hab = habitacion.value || "default";

        const urlEventos = `${base_url}reserva/listar/${llegada}/${salida}/${hab}`;

        fetch(urlEventos)
          .then((response) => response.json())
          .then((data) => successCallback(data))
          .catch((error) => failureCallback(error));
      },
    });
    calendar.render();
  });
</script>


</head>

<body>
  <header class="site-header js-site-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="<?php echo RUTA_PRINCIPAL ?>">Sogo Hotel</a>
        </div>
        <div class="col-6 col-lg-8">

          <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <!-- END menu-toggle -->

          <div class="site-navbar js-site-navbar">
            <nav role="navigation">
              <div class="container">
                <div class="row full-height align-items-center">
                  <div class="col-md-6 mx-auto">
                    <ul class="list-unstyled menu">
                      <li class="active"><a href="<?php echo RUTA_PRINCIPAL ?>">Home</a></li>
                      <li><a href="<?php echo RUTA_PRINCIPAL . 'habitacion'?>">Habitaciones</a></li>
                      <li><a href="<?php echo RUTA_PRINCIPAL . 'nosotros'?>">Nosotros</a></li>
                      <li><a href="<?php echo RUTA_PRINCIPAL . 'eventos'?>">Eventos</a></li>
                      <li><a href="<?php echo RUTA_PRINCIPAL . 'contacto'?>">Contactos</a></li>
                      <li><a href="<?php echo RUTA_PRINCIPAL . 'reservacion'?>">Reservación</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END head -->

  <section class="site-hero overlay" style="background-image: url(../assets/principal/images/hero_4.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade-up">
          <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span
              class="fa fa-star text-primary"></span> Hotel</span>
          <h1 class="heading">A Best Place To Stay</h1>
        </div>
      </div>
    </div>

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section>
  <!-- END section -->

  <div class="row p-5">
    <div class="col-lg-7 col-md-7">
      <div class="card">
        <div class="card-body">
          <div class="alert alert-<?php echo $data['tipo']; ?>" role="alert">
            <strong>Respuesta!</strong> <?php echo $data['mensaje']; ?>
          </div>
          <!-- CALENDARIO -->
          <input type="hidden" id="fecha_llegada" value="<?php echo $data['disponible']['fecha_llegada']; ?>">
          <input type="hidden" id="fecha_salida" value="<?php echo $data['disponible']['fecha_salida']; ?>">
          <input type="hidden" id="habitacion" value="<?php echo $data['disponible']['habitacion']; ?>">
          <div id='calendar'></div>
        </div>
      </div>
    </div>

    <div class="col-lg-5 col-md-5">
      <div class="card">
        <div class="card-body">
          <form id="formulario" method="GET" action="<?php echo RUTA_PRINCIPAL . 'reserva/verify'; ?>">
            <div class="row">
              <div class="col-md-12 mb-3 mb-lg-0 col-lg-4">
                <label for="checkin_date" class="font-weight-bold text-black">Fecha Llegada</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="date" id="fecha_llegada" name="fecha_llegada" class="form-control"
                    value="<?php echo $data['disponible']['fecha_llegada']; ?>">
                </div>
              </div>

              <div class="col-md-12 mb-3 mb-lg-0 col-lg-4">
                <label for="checkout_date" class="font-weight-bold text-black">Fecha Salida</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="date" id="fecha_salida" name="fecha_salida" class="form-control"
                    value="<?php echo $data['disponible']['fecha_salida']; ?>">
                </div>
              </div>

              <div class="col-md-12 mb-3 mb-md-0 col-lg-4">
                <label for="habitacion" class="font-weight-bold text-black">Habitaciones</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="habitacion" id="habitacion" class="form-control">
                    <option value="" selected>Seleccionar</option>
                    <?php foreach ($data['habitaciones'] as $habitacion) { ?>
                    <option value="<?php echo $habitacion['id']; ?>"
                      <?php echo ($habitacion['id'] == $data['disponible']['habitacion']) ? 'selected' : '' ;?>>
                      <?php echo $habitacion['estilo']; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row mt-4 justify-content-center align-items-center">
              <button type="submit" class="btn btn-primary text-dark">Reservar</button>
            </div>

            <!-- IMAGEN HABITACION -->
            <div class="mt-3 text-center">
              <div class="container">
                <img class="rounded img-fluid"
                  src="<?php echo RUTA_PRINCIPAL . 'assets/principal/images/' . $data['habitacion']['foto'] ?>"
                  width="500" height="400" alt="">
                <div class="text mt-2">
                  <span class="d-block mb-4"><span
                      class="display-4 text-primary"><?php echo $data['habitacion']['precio'] ?></span> <span
                      class="text-uppercase letter-spacing-2">/ per night</span> </span>
                  <h2 class="mb-4"><?php echo $data['habitacion']['estilo'] ?></h2>
                  <p><?php echo $data['habitacion']['descripcion'] ?></p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="section footer-section">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Rooms</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="#">The Rooms &amp; Suites</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Restaurant</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
          <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span>
              198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
          <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span>
              (+1) 435 3533</span></p>
          <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span>
              info@domain.com</span></p>
        </div>
        <div class="col-md-3 mb-5">
          <p>Sign up for our newsletter</p>
          <form action="#" class="footer-newsletter">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email...">
              <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
            </div>
          </form>
        </div>
      </div>
      <div class="row pt-5">
        <p class="col-md-6 text-left">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i>
          by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>

        <p class="col-md-6 text-right social">
          <a href="#"><span class="fa fa-tripadvisor"></span></a>
          <a href="#"><span class="fa fa-facebook"></span></a>
          <a href="#"><span class="fa fa-twitter"></span></a>
          <a href="#"><span class="fa fa-linkedin"></span></a>
          <a href="#"><span class="fa fa-vimeo"></span></a>
        </p>
      </div>
    </div>
  </footer>

  <script src="../assets/principal/js/jquery-3.3.1.min.js"></script>
  <script src="../assets/principal/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/principal/js/popper.min.js"></script>
  <script src="../assets/principal/js/bootstrap.min.js"></script>
  <script src="../assets/principal/js/owl.carousel.min.js"></script>
  <script src="../assets/principal/js/jquery.stellar.min.js"></script>
  <script src="../assets/principal/js/jquery.fancybox.min.js"></script>

  <script src="../assets/principal/js/aos.js"></script>
  <script src="../assets/principal/js/bootstrap-datepicker.js"></script>
  <script src="../assets/principal/js/jquery.timepicker.min.js"></script>

  <!-- TRADUCCION ESPAÑOL CALENDAR -->
  <script src="../assets/principal/fullcalendar/es.global.min.js"></script>
  <script src="../assets/principal/js/main.js"></script>

</body>
</htlm>