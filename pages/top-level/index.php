<!DOCTYPE html>
<html lang="en">
<?php
    include "validasi.php";
?>

<head>
    
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../../assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!--Vendor CSS-->
    <link href="../../assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php 
        include"header-mobile.html"
        ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php 
        include"sidebar.php"
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           <?php include
           "header-desktop.html"
           ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <center>
                                        <h3 class="title-2">
                                        Selamat Datang<br><br>
                                        Sistem Informasi Inventori Laboratorium Komputer SMP Negeri 5 Mengwi
                                        </h3>
                                        <br>
                                        <img src="../../assets/images/s200_smpn_5.png" alt="">
                                        </center>
                                    </div>
                                </div>
                            
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                    <ul>
                                        
                                        <li>Pilih menu laporan untuk mencetak laporan inventaris dan laporan maintenance</li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Sistem Informasi Inventori Laboratorium Komputer SMP Negeri 5 Mengwi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>



    </div>

    <!-- Jquery JS-->
    <script src="../../assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- ../../assets/Vendor JS       -->
    <script src="../../assets/vendor/slick/slick.min.js">
    </script>
    <script src="../../assets/vendor/wow/wow.min.js"></script>
    <script src="../../assets/vendor/animsition/animsition.min.js"></script>
    <script src="../../assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../assets/js/main.js"></script>

</body>

</html>
<!-- end document-->

 <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
<div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Contact Form</h4>
                </div>
                <div class="modal-body">
                     <form id="requestacallform" method="POST" name="requestacallform">

                                <div class="form-group">
                                    <div class="input-group">                               
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name"/>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <div class="input-group">                               
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name"/>
                                    </div>
                              </div>
                                <div class="form-group">
                                    <div class="input-group">                               
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email1" type="text" class="form-control" placeholder="Email" name="email1" onchange="validateEmailAdd();"/>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <div class="input-group">                               
                                    <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                    <input id="company_name_c" type="text" class="form-control" placeholder="Company Name" name="company_name_c"/>
                                    </div>
                              </div>
                                <div class="form-group">
                                    <div class="input-group">                               
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input id="phone_mobile" type="text" class="form-control" placeholder="Mobile" name="phone_mobile"/>
                                    </div>
                              </div>
                            <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                        <select class="form-control" name="monthly_rental" class="selectpicker">
                                            <option>How many seats do you have available?</option>
                                            <option>10-50</option>
                                            <option>50-100</option>
                                            <option>100-200</option>
                                            <option>200-500</option>
                                            <option>500+</option>
                                        </select>
                                    </div>
                            </div>
                                <div class="control-group">
                                    <div class="controls">                     
                                        <textarea id="description" type="text" name="description"  placeholder="Description"></textarea>
                                    </div>
                                </div>

                            </form>
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-blue">Submit</button>
              </div>          
        </div>
        </div>
      </div>
    </div>