<!-- ======= Sidebar ======= -->
<?php

session_start();
require("../../controllers/users/checking-using-session.php");

foreach ($sessions as $row) {
  $id = $row['id'];
  $name = $row['name'];
  $firstname = $row['firstname'];
  $picture = $row['picture'];
}

require("nav.php")
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Layouts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="offset-lg-3 col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Enregistement un travail</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="form-register-work" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Titre" required>
                  <label for="floatingName">Titre</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <input type="file" class="form-control" id="file" name="file" placeholder="file" required>
                  <label for="floatingName">Fichier</label>
                  <input type="hidden" name="userId" value="<?= $id ?>">
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="resume" name="resume" id="floatingTextarea" style="height: 100px;" required></textarea>
                  <label for="floatingTextarea">Resume du travail</label>
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="State" name="Categories-domaine">

                  </select>
                  <label for="floatingSelect">Domaine</label>
                </div>
              </div>


              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
  $(document).ready(function() {
    var onClickSelect = "onClickSelect";
    $.ajax({
      method: "post",
      url: "../../controllers/users/checking_select",
      data: {
        onClickSelect: onClickSelect
      },
      success: function(data) {
        $("#floatingSelect").html(data)
      }
    })

    // file validation before to be stored to the database

    $("#file").change(function() {
      var file = this.files[0];
      var fileType = file.type;
      var match = ['application/pdf'];
      if (!((fileType == match[0]))) {
        alert("Desolé, introduis un document pdf. Merci!");
        $("#file").val('');
        return false;
      }
    });

    $(document).on("submit", "#form-register-work", function(e) {
      e.preventDefault();
      $.ajax({
        url: "../../controllers/users/insert-the-released-work.php",
        method: "POST",
        data: new FormData(this),
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(data) {
          $("#form-register-work")[0].reset();
        }
      })
    })
  });
</script>
</body>

</html>