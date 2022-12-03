<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<style>
.fa-notebook:before {
  content: "\e201"; 
}
</style>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="page-header">
        <h1 class="text-center">Assessor's Office</h1>
        <h1 class="d-none"><?php echo $admin_name; ?></h1>
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
                            <h4 class='card-title'><a class='black-text' href="admin-manage-students.php">Manage Students</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4 mt-2'>
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
        <div class='col-md-4 mt-2'>
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
                            <h4 class='card-title'><a class='black-text' href="admin-manage-payments.php">Manage Student Ledger</a></h4>
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
                            <h4 class='card-title'><a class='black-text' href="admin-manage-personnel.php">Manage Personnel</a></h4>
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
                            <h4 class='card-title'><a class='black-text' href="system-logs.php">System Logs</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center bg-primary p-4 mt-2 white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a>
</div>
<?php include('includes/footer.php'); ?>