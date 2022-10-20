<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="page-header">
        <h1>Hello, <?php echo $student_name; ?></h1>
        <p class="font-weight-bold"><?php echo $course."-".$year; ?></p>
        <hr>
	</div>
    <div class="row mx-auto mt-3">
        <h2 class="mr-auto ml-auto d-none">Garcia College of Technology Student Account Information System</h2>
    </div>
</div>
<?php include('includes/footer.php'); ?>