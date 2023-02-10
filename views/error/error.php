<!DOCTYPE html>

<html
  lang="es"
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

    <title>Error 404</title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>


  </head>

  <body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Página No Encontrada</h2>
        <p class="mb-4 mx-2">Oops! 😖 La Dirección de Url No Fue Encontrada.</p>
        <a href="home" class="btn btn-primary">Volver al Inicio</a>
        <div class="mt-3">
          <img
            src="<?php echo media; ?>assets/img/illustrations/page-misc-error-light.png"
            alt="page-misc-error-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="<?php echo media; ?>assets/img/illustrations/page-misc-error-dark.png"
            data-app-light-img="<?php echo media; ?>assets/img/illustrations/page-misc-error-light.png"
          />
        </div>
      </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->


    <?php include "./modulos/scripts.php"; ?>

  </body>
</html>
