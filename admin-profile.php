<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
    $get_profile=retrieve("SELECT * FROM login_credentials LEFT JOIN admin ON login_credentials.user_id=admin.id WHERE username=?",array($_GET['admin']));
?>
<div class="card card-intro grey darken-5">
    <div class="card-body white-text text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <h1 class="font-weight-bold h2">Account Settings</h1>
            </div>
        </div>
    </div>
</div>

<!--Main Layout-->
<main class="pt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" id="edit_id" name="edit_id" class="form-control mb-3" value="<?php echo $get_profile[0]['id']; ?>">
                            <input type="text" id="edit_lastname" name="edit_lastname" class="form-control mb-3" value="<?php echo $get_profile[0]['lastname']; ?>">
                            <input type="text" id="edit_firstname" name="edit_firstname" class="form-control mb-3" placeholder="First name" value="<?php echo $get_profile[0]['firstname']; ?>">
                            <input type="text" id="edit_middlename" name="edit_middlename" class="form-control mb-3" placeholder="Middle name" value="<?php echo $get_profile[0]['middlename']; ?>">
                            <input type="email" id="edit_email" name="edit_email" class="form-control mb-3" placeholder="E-mail address" value="<?php echo $get_profile[0]['email']; ?>">
                            <input type="text" id="edit_contact_number" name="edit_contact_number" class="form-control mb-3" placeholder="Contact Number" value="<?php echo $get_profile[0]['contact_number']; ?>">
                            <div class="text-center">
                                <button type="submit" id="save_profile" name="save_profile" class="btn btn-info btn-md">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header">Password Change</div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="password" id="current_password" class="form-control mb-3" placeholder="Current password">
                            <input type="password" id="new_password" class="form-control mb-3" placeholder="New password">
                            <input type="password" id="confirm_new_password" class="form-control mb-3" placeholder="Confirm new password">
                            <div class="text-center">
                                <button type="submit" id="save_password" name="save_password" class="btn btn-info btn-md">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>