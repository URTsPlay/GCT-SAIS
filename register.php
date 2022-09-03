<?php  include("includes/header.php");  ?>
<?php $page_title="GCT SAIS"; ?>
<?php
date_default_timezone_set("Asia/Manila");
if (isset($_POST['submit'])) {

    manage("INSERT INTO students(schoolid,lastname,firstname,middlename,course,year) 
            VALUES(?,?,?,?,?,?)",
        array($_POST['schoolid'],$_POST['lastname'],$_POST['firstname'],
        $_POST['middlename'],$_POST['course'],$_POST['year']));

    echo "<script type='module'>
			Swal.fire('Success','Added Students Successfully','success');
		</script>";

}

?>
<nav class="navbar navbar-dark warning-color">
  <a class="navbar-brand" href="#">
    <img src="./assets/img/gct_logo.png" height="50" alt="mdb logo">
  </a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <h4 class="white-text mt-2">Garcia College of Technology</h4>
            <span class="sr-only">(current)</span>
        </a>
    </li>
  </ul>
</nav>
<div class="container mt-5">
    <div class="row d-flex justify-center">
        <div class="col-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card mx-auto px-3 py-3" style="max-width: 90%;">
                <h4 class="card-title"><a>Sign-up for an account.</a></h4>
                <p>Create a GCT SAIS account to access your college records.</p>
                <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-university prefix"></i>
                                    <input class="form-control" type="text" name="schoolid" id="schoolid" required>
                                    <label for="schoolid">School ID</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input class="form-control" type="text" name="lastname" id="lastname" required>
                                    <label for="lastname">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input class="form-control" type="text" name="firstname" id="firstname" required>
                                    <label for="lastname">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input class="form-control" type="text" name="middlename" id="middlename">
                                    <label for="lastname">Middle Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-graduation-cap prefix"></i>
                                    <input class="form-control" type="text" name="course" id="course" required>
                                    <label for="lastname">Course</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-calendar prefix"></i>
                                    <input class="form-control" type="number" name="year" id="year" required>
                                    <label for="lastname">Year</label>
                                </div>
                            </div>
                            <div class="d-flex">
                                
                            </div>
                        </div>
                        <button class="btn btn-success float-right" type="submit" name="submit">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>