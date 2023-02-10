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

    <title>Iniciar Sesión | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>
    
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
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
                        <form id="userLogin" class="mb-3 FormularioAjax" action="<?php echo SERVERURL; ?>conexiones/login.php" method="POST" autocomplete="off">
                          <div class="mb-3">
                            <label for="userLogin" class="form-label">Nombre de Usuario</label>
                            <input
                              type="text"
                              class="form-control"
                              id="userLogin"
                              name="usuario"
                              placeholder="Ingresa tu Nombre de Usuario"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Contraseña</label>
                              <a href="password">
                                <small>¿Olvidaste tu Contraseña?</small>
                              </a>
                            </div>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                              />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
                          </div>
                          <div class="RespuestaAjax"></div>
                        </form>
            </div>
          </div>
          <!-- /Register -->
          
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/login.js"></script>

  </body>
</html>
