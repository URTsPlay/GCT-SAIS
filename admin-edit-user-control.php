<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
$id=htmlspecialchars($_GET['id']);
$get_uc_sql=retrieve("SELECT * FROM user_control WHERE id=?",array($id));
$name=$get_uc_sql[0]['firstname']." ".$get_uc_sql[0]['lastname'];



if (isset($_POST['save_user_control'])) {


    manage("UPDATE user_control SET generate_assessment=?, manage_students=?, add_personnel=?, 
    manage_user_control=?, view_system_logs=? WHERE id=?",array($_POST['edit_generate_assessment'], $_POST['edit_manage_students'], 
    $_POST['edit_add_personnel'],$_POST['edit_manage_user_control'],$_POST['edit_view_system_logs'],
    $_POST['user_control_id']));

    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Personnel","Update",
        "<details>
            <p>Update User Control </p>
            <p>
                Name: ".$_POST['edit_fullname']."<br>
                Update Generate Assessment: ".$_POST['edit_generate_assessment']."<br>
                Update Manage Students: ".$_POST['edit_manage_students']."<br>
                Update Add Personnel: ".$_POST['edit_add_personnel']."<br>
                Update Manage User Control: ".$_POST['edit_manage_user_control']."<br>
                Update View System Logs: ".$_POST['edit_view_system_logs']."
            </p>                   
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Update User Control','success');
    </script>";
}
?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Edit User Control for <?php echo $name; ?>
					</div>
                    <div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <input type="text" name="edit_fullname" id="edit_fullname" value="<?php echo $name; ?>" hidden>
                                                <?php
                                                    echo "<input type='text' class='form-control' name='user_control_id' id='user_control_id' value='".$get_uc_sql[0]['id']."' hidden>";
                                                    $update_user_control=array("Generate Assessment"=>$get_uc_sql[0]['generate_assessment'],
                                                    "Manage Students"=>$get_uc_sql[0]['manage_students'],
                                                    "Add Personnel"=>$get_uc_sql[0]['add_personnel'], "Manage User Control"=>$get_uc_sql[0]['manage_user_control'],
                                                    "View System Logs"=>$get_uc_sql[0]['view_system_logs']);
                                                    foreach ($update_user_control as $update_uc_key => $update_uc_value) {
                                                        echo "
                                                            <div class='col-md-2'>
                                                            <small class='form-text text-dark mb-2 mt-0'>".$update_uc_key."</small>
                                                                <select class='form-control' name='edit_".strtolower(str_replace(" ","_",$update_uc_key))."' id='edit_".strtolower(str_replace(" ","_",$update_uc_key))."'>
                                                                    <option></option>
                                                                    <option value='1' ".($update_uc_value=="1"?"selected":"").">Yes</option>
                                                                    <option value='0' ".($update_uc_value=="0" || $update_uc_value==""?"selected":"").">No</option>
                                                                </select>    
                                                            </div>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary btn-sm" name="save_user_control">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/modal.php') ?>
<?php include('includes/footer.php'); ?>