<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="users/assets/img/favicon.png" rel="icon">
  <link href="users/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="users/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="users/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="users/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="users/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="users/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="users/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="users/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="users/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
   /* *,
    span,
    h5 {
      font-family:Georgia, 'Times New Roman', Times, serif;
    }*/
  </style>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="users/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Unikin numerica</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Création du compte</h5>
                    <span id="message-login"></span>
                  </div>

                  <form class="row g-3" id="register-form" method="POST">

                  <div class="col-12">
                      <label for="nom" class="form-label">Nom</label>
                      <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="nom" class="form-control" id="nom" required>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="username" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="col-12">
                      <label for="yourPicture" class="form-label">Photo</label>
                      <input type="file" name="file" class="form-control" id="file" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Déjà un compte? <a href="../views/login">Connectez vous</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="users/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="users/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="users/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="users/assets/vendor/echarts/echarts.min.js"></script>
  <script src="users/assets/vendor/quill/quill.min.js"></script>
  <script src="users/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="users/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="users/assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="users/assets/js/main.js"></script>

  <script>
    $(document).ready(function() {

      $(document).on("submit", "#register-form", function(e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "../controllers/users/register.php",
          data: new FormData(this),
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            //$("#login-message").css("display", "block");
          }
        })
      })
    })
  </script>

</body>

</html>