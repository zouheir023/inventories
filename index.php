<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="libs/css/login-page.css" />
<link rel="icon" type="image/x-icon" href="libs/images/Inventory-maintenance_25374.ico">
  </head>
  <body>
<div class="page">
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="col-md-6 d-none d-md-flex bg-image"></div>
    <div class="col-md-6 bg-light">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-xl-6 mx-auto">
            <h3 class="display-4">Welcome</h3>
              <h2>Inventory Management System</h2>
              <?php echo display_msg($msg); ?>

              <br>
              <form method="post" action="auth.php" class="clearfix">
                <div class="form-group mb-3">
                  <input id="inputEmail" type="text" name="username" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                  <input id="inputPassword" type="password" name= "password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger">
                  <br>
                </div>
                <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
