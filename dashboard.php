<?php  include("includes/header.php");  ?>
<?php include('includes/session.php'); ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="page-header">
        <h1>Hello, <?php echo $name; ?></h1>
        <p class="font-weight-bold"><?php echo $course."-".$year; ?></p>
        <hr>
	</div>
    <div class="row mx-auto mt-3">
        <h2 class="mr-auto ml-auto">Garcia College of Technology Student Account Information System</h2>
    </div>

    <div class="row mt-4">
        <?php
            $admin_list=array("Manage Students"=>"manage-students.php",
                    "Manage Payments"=>"manage-payments.php","Manage Users"=>"manage-users.php");
            foreach ($admin_list as $admin_list_key => $admin_list_value) {
                echo "<div class='col-md-4'>
                        <div class='card text-center'>
                            <div class='d-flex flex-row'>
                                <div class='p-2'>
                                    <span class='fas fa-users' style='font-size: 7rem;'></span>
                                </div>
                                <div class='p-2'>         
                                    <div class='card-body'>
                                        <h4 class='card-title'><a class='black-text' href='".$admin_list_value."'>".$admin_list_key."</a></h4>
                                    </div>  
                                </div>
                            </div>
                        </div>
                </div>";
            }
        ?>
        <!-- <div class="col-md-4">
            <div class="card text-center">
                <div class="d-flex flex-row" onclick="window.location.href='manage-students.php'">
                    <div class="p-2">
                        <span class="fas fa-users" style="font-size: 7rem;"></span>
                    </div>
                    <div class="p-2">         
                        <div class="card-body">
                            <h4 class="card-title"><a>Manage Students</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php include('includes/footer.php'); ?>