<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<style>
.fa-notebook:before {
  content: "\e201"; 
}
</style>
<?php $page_title="Admin Dashboard"; ?>
<?php
    $get_user_control=retrieve("SELECT * FROM user_control WHERE id=?",array($admin_id));
?>
<div class="container mt-3">
    <div class="page-header">
        <h1 class="text-center">Assessor's Office</h1>
        <h4><?php echo $admin_name; ?></h4>
        <hr>
	</div>
    <div class="row mx-auto mt-3">
        <h2 class="mr-auto ml-auto">Garcia College of Technology Student Account Information System</h2>
    </div>

    <div class="row mt-4">
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-users' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <?php
                                    if ($get_user_control[0]['manage_students'] == 1) {
                                ?>
                                    <a class='black-text' href="admin-manage-students.php">Manage Students</a>
                                <?php
                                    } else {
                                ?>
                                <a class='black-text' onclick="showErrorMessage()">Manage Students</a>
                                <?php
                                    }
                                ?>
                            </h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2 d-none'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-book' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'><a class='black-text' href="admin-manage-subjects.php">Manage Subjects</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2 d-none'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-school' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'><a class='black-text' href="admin-manage-courses.php">Manage Courses</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-newspaper' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <?php
                                    if ($get_user_control[0]['generate_assessment'] == 1) {
                                ?>
                                   <a class='black-text' href="admin-manage-payments.php">Manage Student Ledger</a>
                                <?php
                                    } else {
                                ?>
                                <a class='black-text' onclick="showErrorMessage();">Manage Student Ledger</a>
                                <?php
                                    }
                                ?>
                            </h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-graduation-cap' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'><a class='black-text' href="admin-manage-scholarships.php">Manage Scholarship</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-user-gear' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <?php
                                    if ($get_user_control[0]['add_personnel'] == 1) {
                                ?>
                                   <a class='black-text' href="admin-manage-personnel.php">Manage Personnel</a>
                                <?php
                                    } else {
                                ?>
                                <a class='black-text' onclick="showErrorMessage();">Manage Personnel</a>
                                <?php
                                    }
                                ?>
                            </h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-user-lock' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <?php
                                    if ($get_user_control[0]['manage_user_control'] == 1) {
                                ?>
                                   <a class='black-text' href="admin-manage-user-control.php">Manage User Control</a>
                                <?php
                                    } else {
                                ?>
                                <a class='black-text' onclick="showErrorMessage();">Manage User Control</a>
                                <?php
                                    }
                                ?>
                            </h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-history' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <?php
                                    if ($get_user_control[0]['manage_user_control'] == 1) {
                                ?>
                                   <a class='black-text' href="system-logs.php">System Logs</a>
                                <?php
                                    } else {
                                ?>
                                <a class='black-text' onclick="showErrorMessage();">System Logs</a>
                                <?php
                                    }
                                ?>
                            </h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center bg-primary p-4 mt-5 white-text d-none" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a><br>
    <span>Developed by Project69</span>
</div>
<?php include('includes/footer.php'); ?>
<script>
    function showErrorMessage(){
        Swal.fire('Error','Access Denied','error');
    }
</script>