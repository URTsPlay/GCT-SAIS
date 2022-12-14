<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
$get_profile=retrieve("SELECT * FROM login_credentials LEFT JOIN admin ON login_credentials.user_id=admin.id WHERE username=?",array($_GET['admin']));

if (isset($_POST['save_profile'])) {
    manage("UPDATE admin 
        SET lastname=?, firstname=?, middlename=?,
        email=?, contact_number=? WHERE id=?",
    array($_POST['edit_lastname'],$_POST['edit_firstname'],$_POST['edit_middlename'],
        $_POST['edit_email'],$_POST['edit_contact_number'],$_POST['edit_id']));
    
    echo "<script type='module'>
            Swal.fire('Success','Profile updated successfully','success');
        </script>";
}


if (isset($_POST['save_password'])) {
    $get_curr_pass=retrieve("SELECT * FROM login_credentials WHERE username=?",array($_GET['user']));

    if ($get_curr_pass[0]['password'] == $_POST['current_password']) {
        if ($_POST['new_password'] == $_POST['confirm_new_password']) {
            $change_pass=manage("UPDATE login_credentials SET password=? WHERE username=?",array($_POST['new_password'],$_GET['user']));
            echo "<script type='module'>
            Swal.fire('Success','Password changes successfully','success');
        </script>";
        } else {
            echo "<script type='module'>
            Swal.fire('Error','Passwords do not match','error');
        </script>";
        }
    } else {
        echo "<script type='module'>
            Swal.fire('Error','Current Password do not match','error');
        </script>";
    }
}
?>
<div class="card card-intro bg-primary">
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
                            <input type="password" id="current_password" name="current_password" class="form-control mb-3" placeholder="Current password">
                            <input type="password" id="new_password" name="new_password" class="form-control mb-3" placeholder="New password">
                            <input type="password" id="confirm_new_password" name="confirm_new_password" class="form-control mb-3" placeholder="Confirm new password">
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