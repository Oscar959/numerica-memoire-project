<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../admin/assets/img/favicon.png" rel="icon">
    <link href="../admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    * {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../admin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <select name="select_categories" id="select_categories" class="form-control">
                    <option value='All'>Tout</option>
                </select>
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Quitter</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-8 align-items-top work-to-be-display">

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
    <script src="../admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../admin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../admin/assets/vendor/quill/quill.min.js"></script>
    <script src="../admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../admin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../admin/assets/js/main.js"></script>
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function onLoadSelect() {
                var change_select = "onLoadSelect";
                $.ajax({
                    url: "../../controllers/public/bibliotheca.php",
                    method: "POST",
                    data: {
                        change_select: change_select
                    },
                    success: function(data) {
                        $("#select_categories").html(data);
                    }
                })
            }
            onLoadSelect();

            $(document).on("change", "#select_categories", function() {
                var changeSelect = $("#select_categories").val();

                if (changeSelect == "029fc31a-b403-4b12-e8ae-fbdf4a181ebd") {
                    $.ajax({
                        url: "../../controllers/public/bibliotheca.php",
                        method: "POST",
                        data: {
                            changeSelectTout: changeSelect
                        },
                        success: function(data) {
                            $(".work-to-be-display").html(data);
                        }
                    })
                } else {
                    $.ajax({
                        url: "../../controllers/public/bibliotheca.php",
                        method: "POST",
                        data: {
                            changeSelect: changeSelect
                        },
                        success: function(data) {
                            $(".work-to-be-display").html(data);
                        }
                    })
                }

            })

            function LoadAllDocument() {
                var all = "all";
                $.ajax({
                    url: "../../controllers/public/bibliotheca.php",
                    method: "POST",
                    data: {
                        all: all
                    },
                    success: function(data) {
                        $(".work-to-be-display").html(data);
                    }
                })
            }

            LoadAllDocument();

            //getting the click on the download link in order to update the counter of download

            $(document).on("click", ".link-doc-class", function(e) {
                e.preventDefault();

                var title = $(this).attr("id");
                //alert(title)
                $.ajax({
                    url: "../../controllers/public/bibliotheca.php",
                    method: "POST",
                    data: {
                        title: title
                    },
                    success: function(data) {
                        LoadAllDocument();
                        window.location = '../../views/users/viewingTheFIle.php?title=' + title;
                    }
                })

            })
        })
    </script>

</body>

</html>