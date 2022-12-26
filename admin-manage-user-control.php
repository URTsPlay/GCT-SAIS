<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php

if (isset($_POST['add_user_control'])) {

    manage("INSERT INTO user_control(admin_id,generate_assessment,manage_students,add_personnel,manage_user_control,view_system_logs) VALUES(?,?,?,?,?,?)",
    array($_POST['admin_id'],$_POST['generate_assessment'],$_POST['manage_students'],$_POST['add_personnel'],
    $_POST['manage_user_control'],$_POST['view_system_logs']));

    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Personnel","ADD",
        "<details>
            <p>Add User Control </p>
            <p>
                Name: ".$_POST['fullname']."<br>
                Manage Assessment: ".$_POST['generate_assessment']."<br>
                Manage Students: ".$_POST['manage_students']."<br>
                Manage Personnel: ".$_POST['add_personnel']."
                Manage User Control: ".$_POST['manage_user_control']."<br>
                View System Logs: ".$_POST['view_system_logs']."
            </p>                   
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Added User Control','success');
    </script>";
}
?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add User Control
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <small class='form-text text-dark mb-2 mt-0'>Name</small>
                                    <select class="form-control" name="admin_id" id="admin_id">
                                        <option value=""></option>
                                        <?php
                                            $get_admin=retrieve("SELECT * FROM admin",array());
                                            for ($i=0; $i<COUNT($get_admin); $i++) { 
                                                echo "<option value='".$get_admin[$i]['id']."'>".$get_admin[$i]['firstname']." ".$get_admin[$i]['lastname']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <?php
                                        $new_user_control=array("Manage Assessment"=>"generate_assessment","Manage Students"=>"manage_students",
                                        "Manage Personnel"=>"add_personnel","Manage User Control"=>"manage_user_control","View System Logs"=>"view_system_logs");
                                        foreach ($new_user_control as $uc_key => $uc_value) {
                                            echo "
                                            <small class='form-text text-dark mb-2 mt-0'>".$uc_key."</small>
                                            <select class='form-control' name='".$uc_value."'>
                                                <option></option>
                                                <option value='1'>Yes</option>
                                                <option value='0'>No</option>
                                            </select>    ";
                                        }
                                    ?>
                                    <button type="submit" class="btn btn-primary btn-sm" name="add_user_control">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-8 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage User Control
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblCourses">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","Last Name,Manage Assessments,Manage Students,Manage Personnel,Manage User Control,View System Logs,Actions");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_uc_admin = retrieve("SELECT * FROM user_control INNER JOIN admin ON user_control.admin_id=admin.id",array());
                                            for ($i=0; $i < count($disp_uc_admin); $i++) { 
                                                $name=$disp_uc_admin[$i]['firstname']." ".$disp_uc_admin[$i]['lastname'];
                                            echo "<tr>
                                                    <td>".$name."</td>
                                                    <td>".($disp_uc_admin[$i]['generate_assessment'] == 1 ? "Yes":"No")."</td>
                                                    <td>".($disp_uc_admin[$i]['manage_students'] == 1 ? "Yes":"No")."</td>
                                                    <td>".($disp_uc_admin[$i]['add_personnel'] == 1 ? "Yes":"No")."</td>
                                                    <td>".($disp_uc_admin[$i]['manage_user_control'] == 1 ? "Yes":"No")."</td>
                                                    <td>".($disp_uc_admin[$i]['view_system_logs'] == 1 ? "Yes":"No")."</td>
                                                    <td>
                                                        <a class='m-1' href='admin-edit-user-control.php?id=".$disp_uc_admin[$i]['id']."'>
                                                            <i class='fas fa-universal-access hvr-pop'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                 </table>
                            </div>
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
<?php include('includes/modal.php') ?>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $('.mdb-select').materialSelect();
    $("#tblCourses").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [],
	});

    $(".edit_user_control").click(function(){
		$("#edit_admin_id").val($(this).attr("edit_admin_id"));
        $("#fullname").val($(this).attr("fullname"));
        $("#admin_name").text($(this).attr("admin_name"));
		$("#edit_admin_modal").modal("show");
	});

    $(".edit_admin").click(function(){
		$("#edit_user_control_id").val($(this).attr("edit_user_control_id"));
		$("#edit_user_control_modal").modal("show");
	});
})
</script>