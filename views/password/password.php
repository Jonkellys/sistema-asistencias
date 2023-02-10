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

    <title>Restaurar Contraseña | <?php echo NOMBRE;?></title>

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
              <div class="app-brand justify-content-center">
                <a href="javascript:void(0);" class="app-brand-link gap-2">
                <span style="width: 18%; height: 25%;" class="app-brand-logo demo">
                  <img style="width: 100%; height: 100%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
                </span>
                <h4 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h4>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">¿Olvidaste tu Contraseña? 🔒</h4>
              <p class="mb-4">Ingresa tu Correo y te enviaremos instrucciones para seguir.</p>
              <form action="<?php echo SERVERURL; ?>conexiones/recovery.php" enctype="multipart/form-data" method="POST" data-form="recovery" class="FormularioAjax">
                <div class="mb-3">
                  <label for="email" class="form-label">Correo</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Ingresa tu Correo"
                    autofocus
                    autocomplete="off"
                  />
                </div>
                <div class="row mt-4">
                  <label for="pregunta" class="form-label">Usa tu pregunta secreta</label>
                  <div id="defaultFormControlHelp" class="mt-0">
                    ¿Cuál es tu color favorito?
                  </div>
                  <div class="col-sm-10">
                    <input type="text" autocapitalize="" name="pregunta" onkeypress="return letras(event)" id="pregunta" class="form-control" placeholder="Ingresar Apellido" />
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary d-grid w-100">Enviar</button>
                <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
              </form>
              <div class="text-center">
                <a href="login" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Volver al login
                </a>
              </div>
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
