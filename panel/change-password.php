<?php
session_start();
require_once("inc/config.php");

if(!isset($_SESSION['userid'])){
  header("Location: ./login.php");
  exit;
}

if($auth['group_id'] != 2){
  header("Location: ./index.php");
  exit;
}


if($_POST){
  $password = md5($_POST['password']);
  $password_confirmation = md5($_POST['confirmation']);

  if(strlen($_POST['password'])>=6){
    if($password == $password_confirmation){

      $update = $db->query("UPDATE users SET password='$password' WHERE id='$auth[id]'");
      if($update)
        $message = "Password changed successfully!";
      else
        $error = "There was a database error.";

    } else {
      $error = "The entered passwords don't match each other..";
    }
  } else {
    $error = "Your password can not be shorter than 6 characters.";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Change Password | <?php echo TITLE; ?></title>

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
            <div class="col-md-12">
              <?php
                if(isset($message)){
              ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <strong>Successfull!</strong> <?php echo $message; ?>
              </div>
              <?php
                }
              ?>
              <?php
                if(isset($error)){
              ?>
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <strong>Error!</strong> <?php echo $error; ?>
              </div>
              <?php
                }
              ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Change Password</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form method="post" enctype="multipart/form-data">

                    <label for="password">Password * :</label>
                    <input type="password" name="password" id="password" class="form-control">

                    <label for="confirmation">Password Confirmation * :</label>
                    <input type="password" name="confirmation" id="confirmation" class="form-control">

                    <div class="ln_solid"></div>

                    <button type="submit" class="btn btn-primary">Save</button>

                  </form>
                  <!-- end form for validations -->

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

    <!-- Custom Theme Scripts -->
    <script src="theme/build/js/custom.min.js"></script>

  </body>
</html>
