<!DOCTYPE html>
<html
  lang="en"
  class="light-style"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <!-- Content -->

    <!--Under Maintenance -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
      <div class="app-brand justify-content-center">
        <a href="javascript:void(0);" class="app-brand-link gap-2">
        <span style="width: 19%; height: 25%;" class="app-brand-logo demo">
              <img style="width: 70%; height: 70%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
            </span>
            <h3 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h3>
        </a>
      </div>
      <p class="mb-0" style="margin-top: 1%;">Bienvenido, al sistema de asistencias de <?php echo NOMBRE;?></p>
        <div class="mt-2">
          <img
            src="<?php echo media; ?>assets/img/illustrations/girl-doing-yoga-light.png"
            alt="girl-doing-yoga-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
            data-app-light-img="illustrations/girl-doing-yoga-light.png"
          />
        </div>
        <a style="margin-top: 1%;" href="login">
        <button class="btn btn-primary btn-lg" type="button">
          <i class="menu-icon tf-icons bx bx-log-in"></i>
            Iniciar Sesión
          </button>
        </a>
      </div>
    </div>
    <!-- /Under Maintenance -->

    <!-- / Content -->

    <?php include "./modulos/scripts.php"; ?>

  </body>
</html>
