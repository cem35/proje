<?php 

session_start();
require_once("inc/config.php");


 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Applications | <?php echo TITLE; ?></title>

    <!-- Bootstrap -->
    <link href="theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="theme/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="theme/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php
            include('layouts/sidebar.php');
          ?>
        </div>

        <!-- top navigation -->
          <?php
            include('layouts/header.php');
          ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Applications</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php

                      $applications = $db->query("SELECT *
                        FROM applications
                        ORDER BY created_at ASC");

                  ?>

                  <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Mobile</th>
                        <th class="text-center">Post Code</th>
                        <th class="text-center">Photos</th>
                        <th class="text-center">Subscribe</th>
                        <th class="text-center">Application Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      foreach($applications as $application){

                      ?>
                      <tr>
                        <td class="text-center"><?php echo $application['name']; ?></td>
                        <td class="text-center"><?php echo $application['email']; ?></td>
                        <td class="text-center"><?php echo $application['mobile']; ?></td>
                        <td class="text-center"><?php echo $application['postcode']; ?></td>
                        <td class="text-center"><a target="_blank" href="../images/<?php echo $application['image']; ?>">Photo</a></td>
                        <td class="text-center"><?php echo $application['subscribe'] ? '<i class="fa fa-check"></i>':''; ?></td>
                        <td class="text-center"><?php echo $application['created_at']; ?></td>
                      </tr>

                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php
            include('layouts/footer.php');
          ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="theme/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="theme/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="theme/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="theme/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="theme/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="theme/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="theme/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="theme/vendors/Flot/jquery.flot.js"></script>
    <script src="theme/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="theme/vendors/Flot/jquery.flot.time.js"></script>
    <script src="theme/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="theme/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="theme/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="theme/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="theme/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="theme/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="theme/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="theme/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="theme/vendors/moment/min/moment.min.js"></script>
    <script src="theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="theme/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/javascript"></script>
    <script src="theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>

    <!-- Custom Theme Scripts -->
    <script src="theme/build/js/custom.min.js"></script>

    <script type="text/javascript">
      $("table").dataTable();
    </script>

  </body>
</html>
