<?php  include("includes/header.php");  ?>
<!-- <link rel="stylesheet" href="./assets/css/a_style.css"> -->
<style type="text/css">
body,html{
    height: 100%;
}
.bg-img {
  background-image: url("./assets/img/gct_background12.JPG");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<?php $page_title="GCT SAIS"; ?>
<nav class="navbar navbar-dark warning-color">
  <a class="navbar-brand" href="#">
    <img src="./assets/img/gct_logo.png" height="50" alt="mdb logo">
  </a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <h4 class="white-text mt-2" style="font-family: 'Cooper Black', sans-serif;'">Garcia College of Technology</h4>
            <span class="sr-only">(current)</span>
        </a>
    </li>
  </ul>
</nav>
<div class="bg-img">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <img style="margin-right:auto;margin-left:auto;display:block;" src="./assets/img/project69_logo.png" height="200" alt="GCT Logo">
            </div>
            <div class="mr-auto ml-auto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                    <div class="card rounded-0" style="background-color: rgba(41, 39, 39, 0.3);box-shadow: 0 5px 30px black;" style="max-width: 60%;">
                        <div class="card-header">
                            <h3 class="text-center text-white font-weight-bold">Sign In</h3>
                        </div>
                        <div class="card-body p-1">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                <form class="form" method="post" action="processes/login.php" role="form" autocomplete="off" id="formLogin">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                                <div class="md-form">
                                                    <i class="fas fa-user-circle white-text prefix"></i>
                                                    <input class="form-control form-control-lg rounded-0 text-white" type="text" name="username" id="username" required>
                                                    <label class="text-white" for="password">School ID Number</label>
                                                </div>
                                                <div class="md-form">
                                                    <i class="fas fa-lock white-text prefix"></i>
                                                    <input class="form-control form-control-lg rounded-0 text-white" type="password" name="password" id="admin_pass" required autocomplete="new-password">
                                                    <label class="text-white" for="password">Password</label>
                                                </div>
                                                <div class="form-group d-xl-flex d-lg-flex d-md-flex d-sm-flex d-xs-flex d-flex">
                                                    <div class="w-50">
                                                        <p class="white-text">Don't have a GCT-SAIS Account? Click <a class="yellow-text" href="register.php">here</a> to sign up</p>
                                                        <p><a href="forgot-password.php">Forgot Password</a></p>
                                                    </div>
                                                    <div class="w-50">
                                                        <button class="btn btn-success btn-lg btn-rounded float-right" type="submit" name="login" id="btnLogin">Login</button>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center bg-primary p-2  white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a><br>
    <span>Developed by Project69</span>
</div>
<?php include('includes/footer.php'); ?>