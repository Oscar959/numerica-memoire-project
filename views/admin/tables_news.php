<!-- ======= Sidebar ======= -->
<?php

session_start();
require("../../controllers/admin/checking-using-session.php");

foreach ($sessions as $row) {
  $id = $row['id'];
  $name = $row['name'];
  $firstname = $row['firstname'];
  $picture = $row['picture'];
}

require("nav.php")
?>
<!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../views/users/index">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Top Selling -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Top Selling <span>| Today</span></h5>

            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">Pic</th>
                  <th scope="col">Sujet</th>
                  <th scope="col">Categories</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="work-released-wait-to-accept">
              
              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Top Selling -->

    </div>
    </div><!-- End Left side columns -->

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

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script>
  $(document).ready(function() {

    function getTableInRealesed() {
      var table_to_be_released = "table_to_be_released";
      $.ajax({
        url: "../../controllers/admin/getTableInRealed.php",
        method: "POST",
        data: {
          table_to_be_released: table_to_be_released
        },
        success: function(data) {
          $("#work-released-wait-to-accept").html(data);
        }
      })
    }

    getTableInRealesed();


    //displaying the tooltip message

    $(document).on("mouseover",".link-file-pdf",function(){
      $('a').tooltip();
    });

    //approving the work after studying the doc

    $(document).on("click", ".btn-approving",function(){
      var id = $(this).attr("id");
      
      $.ajax({
        url:"../../controllers/admin/changingStatus.php",
        method:"POST",
        data:{
          data:id
        },
        beforeSend:function(){
          return confirm("Avez-vous lu tous le travail? confirmez-vous que ce travail est bien fait? qu'il peut etre vu au public?")
        },
        success:function(){
          getTableInRealesed();
        }
      })
    })
  });
</script>
</body>

</html>