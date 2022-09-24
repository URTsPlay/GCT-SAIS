<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="page-header">
        <h1>Hello, <?php echo $admin_name; ?></h1>
        <hr>
	</div>
    <div class="row mx-auto mt-3">
        <h2 class="mr-auto ml-auto">Garcia College of Technology Student Account Information System</h2>
    </div>

    <div class="row mt-4">
        <div class='col-md-4'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-users' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'><a class='black-text' href="admin-manage-students.php">Manage Users</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class='card text-center'>
                <div class='d-flex flex-row'>
                    <div class='p-2'>
                        <span class='fas fa-money-bill' style='font-size: 7rem;'></span>
                    </div>
                    <div class='p-2'>         
                        <div class='card-body'>
                            <h4 class='card-title'><a class='black-text' href="admin-manage-payments.php">Manage Payments</a></h4>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>