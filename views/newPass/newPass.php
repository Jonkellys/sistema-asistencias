<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>Recuperar Cuenta | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center" style="margin-bottom: 1%;">
                <a href="javascript:void(0);" class="app-brand-link gap-2">
                <span style="width: 18%; height: 25%;" class="app-brand-logo demo">
                  <img style="width: 100%; height: 100%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
                </span>
                <h4 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h4>
                </a>
              </div>
              <!-- /Logo -->

              <?php
              $token = $_GET['token'];
              ?>

              <h4 class="mt-3" style="margin-bottom: 3%;">Recuperar Contraseña</h4>
              <form action="<?php echo SERVERURL; ?>conexiones/newPass.php" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="mb-3">
                  <label for="pass" class="form-label">Nueva contraseña</label>
                  <input
                    type="password"
                    class="form-control"
                    name="pass"
                    placeholder="Ingresa tu nueva contraseña"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="newpass" class="form-label">Confirmar contraseña</label>
                  <input
                    type="password"
                    class="form-control"
                    name="newpass"
                    placeholder="Confirma la contraseña"
                    autofocus
                  />
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Enviar</button>
                <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
              </form>
              
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

  

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>

  </body>
</html>
