<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); 
    $get_mi=substr($student_middlename,0,1);
?>
<?php $page_title="Home Page"; ?>
<div class="container ma-0 pa-0 mt-3" background-color="whitesmoke;">
    <div class="row">
        <div class="col-md-12">
            <h4 class="h4" style="font-size:34px;">Hi <?php echo $student_firstname; ?>!</h4>
            <h6 style="font-size:20px;" class="pb-5">Welcome to Garcia College of Technology Student Accounts Information System</h6>
        </div>
	</div>
    
    <div class="elevation-0 ma-0" style="background-color:whitesmoke !important;">
        <div class="pa-7 elevation-0 ma-0 white-text blue darken-4">
            <div class="card pa-0 ma-0 white-text blue darken-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 style="font-size:20px;" class="font-weight-bold h6"><?php echo $student_firstname." ".$get_mi.". ".$student_lastname; ?></h6>
                            <span>Student ID No. <?php echo $student_schoolid; ?></span>
                        </div>
                        <div class="col-md-3">
                            <h6 style="font-size:20px;" class="font-weight-bold h6"><?php echo $course." - ".$year; ?></h6>
                            <span>COURSE AND YEAR</span>
                        </div>
                        <div class="col-md-3">
                            <h6 style="font-size:20px;" class="font-weight-bold h6">SY <?php echo date("Y")."-".date("Y",strtotime("+ 1 year")); ?></h6>
                            <span>School Year</span>
                        </div>
                        <div class="col-md-2">
                            <h6 style="font-size:20px;" class="font-weight-bold h6">1st Semester</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="row pa-7 white-text" style="background-color: #FFB300;">
        <div class="col-md-6">
            <h6 style="font-size:20px;" class="font-weight-bold h6"><?php echo $student_fullname; ?></h6>
            <span>School ID No. <?php echo $student_schoolid; ?></span>
        </div>
        <div class="col-md-6">
            <h6 style="font-size:20px;" class="font-weight-bold h6"><?php echo $course." - ".$year; ?></h6>
            <span>COURSE AND YEAR</span>
        </div>
    </div> -->
    <h6 style="font-size:20px;" class="font-weight-bold mt-5 mb-2">QUICK ACCESS</h6>
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="./assets/img/home_ass.jpg" height="250px" alt="">
                <div class="card-body">
                    <h5 class="card-title">ASSESSMENT & STUDENT FEES</h5>
                    <p class="card-text">The Assessment and Student Fees allows student to view their general fees, tuition and examination fees.</p>
                    <div class="card-actions">
                        <a href="student-assessment.php" class="btn btn-primary d-block">View Assessment</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="./assets/img/student_ledger.jpeg" height="250px" alt="">
                <div class="card-body">
                    <h5 class="card-title">STUDENT ACCOUNT LEDGER</h5>
                    <p class="card-text">The Student Account Ledger allows student to view student account information and account transaction details.</p>
                    <div class="card-actions">
                        <a href="student-account-ledger.php" class="btn btn-primary d-block">View Account Ledger</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="./assets/img/students_profile.jpg" height="250px" alt="">
                <div class="card-body">
                    <h5 class="card-title">STUDENT PROFILE</h5>
                    <p class="card-text">The Student Profile allows student to change and update their Profile Information and Password.</p>
                    <div class="card-actions">
                        <a href="student-profile.php?user=<?php echo $student_username; ?>" class="btn btn-primary d-block">Update Your Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center bg-primary p-4 mt-3 white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a><br>
    <span>Developed by Project69</span>
</div>
<?php include('includes/footer.php'); ?>