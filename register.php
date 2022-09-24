<?php  include("includes/header.php");  ?>
<style>
.captcha_div {
  height: 55px; width: 186px; text-align: center; font-size: 28px;
  color: black; background-color: gray; font-family: "Courier New"; font-weight: bold;
}
.fa-arrows-rotate:before{ content: "\f021"; }
</style>
<?php $page_title="GCT SAIS"; ?>
<?php
date_default_timezone_set("Asia/Manila");
if (isset($_POST['submit'])) {
    
    $check_schoolid=retrieve("SELECT COUNT(*) as count_schoolid FROM students WHERE schoolid=?",array($_POST['schoolid']));

    if ($check_schoolid[0]['count_schoolid'] > 0) {
        echo "<script type='module'>
                Swal.fire('Warning','School ID is already existing','warning');
            </script>";
    } else {
        if ($_POST['captcha_code'] == $_POST['captcha_code_display']) {

            manage("INSERT INTO students(schoolid,lastname,firstname,middlename,email,contact_number,course,year,created_at,updated_at)
            VALUES(?,?,?,?,?,?,?,?,?,?)",array($_POST['schoolid'],$_POST['lastname'],$_POST['firstname'],$_POST['middlename'],
            $_POST['email'],$_POST['contact_number'],$_POST['course'],$_POST['year'],date("Y-m-d h:i:s a"),date("Y-m-d h:i:s a")));
            manage("INSERT INTO login_credentials(user_id,username,password,type,status,created_at,updated_at) 
                    VALUES(?,?,?,?,?,?,?)",array($pdo->lastInsertId(),$_POST['schoolid'],'123456',2,1,date("Y-m-d H:i:s a"),date("Y-m-d H:i:s a")));

            echo "<script type='module'>
                    Swal.fire('Success','Registered Successfully','success');
                </script>";
        } else {
            echo "<script type='module'>
                    Swal.fire('Error','Captcha Code does not match','error');
                </script>";
        }
    }

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
                                    <label for="firstname">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input class="form-control" type="text" name="middlename" id="middlename">
                                    <label for="middlename">Middle Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input class="form-control" type="email" name="email" id="email">
                                    <label for="email">Email Address</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-phone prefix"></i>
                                    <input class="form-control" type="text" name="contact_number" id="contact_number">
                                    <label for="contact_number">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <select class="mdb-select md-form" name="course" id="course" searchable="Search here..">
                                        <option value="">Select Course</option>
                                        <?php
                                            $course=retrieve("SELECT * FROM courses ORDER BY course_code ASC",array());
                                            for ($i=0; $i < COUNT($course); $i++) { 
                                                echo "<option value=".$course[$i]['course_code'].">".$course[$i]['course_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="md-form">
                                    <input class="form-control" type="number" name="year" id="year" required>
                                    <label for="year">Year</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="captcha_div ml-3" type="text" id="captcha_code_display" name="captcha_code_display" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-arrows-rotate prefix"></i>
                                    <input class="form-control" type="text" name="captcha_code" id="captcha_code">
                                    <label for="captcha_code">Type the captcha code</label>
                                </div>
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
<script>
$(document).ready(function(){

    $('.mdb-select').materialSelect();
    var captcha_code_display = Math.random().toString(36).slice(2, 9).toUpperCase();
    $("#captcha_code_display").val(captcha_code_display);

    // var url = "data/courses.json";
    // $.getJSON(url, function (data) {
    //     $.each(data, function (index, value) {
    //         $('#course').append('<option value="' + value.course_code + '">' + value.course_name + '</option>');
    //     });
    // });
});
</script>
