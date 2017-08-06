<?php
session_start();
require_once("inc/config.php");

if($_POST){
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $user = $db->query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1")->fetch();

  if(isset($user)){  
    $_SESSION['userid'] = 1;
    header("Location: ./index.php");
  } else {
    $error = "E-mail or password was incorrect.";
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

    <title>Login | <?php echo TITLE; ?></title>

    <!-- Bootstrap -->
    <link href="theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="theme/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="theme/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <?php
            if(isset($error)){
          ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <strong>Error!</strong> <?php echo $error; ?>
          </div>
          <?php
            }
          ?>
          <div class="clearfix"></div>
          <section class="login_content">
            <form method="post">
              <h1>LOGIN</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><i class="fa fa-television"></i> <?php echo TITLE; ?></h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
