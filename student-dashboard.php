<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h6 class="font-weight-bold">You are logged in as, <?php echo $student_fullname; ?></h6>
            <p class="font-weight-bold">ID Number: <?php echo $student_schoolid; ?><br><?php echo $course."-".$year; ?></p>
            <hr>
        </div>
	</div>
</div>
<?php include('includes/footer.php'); ?>