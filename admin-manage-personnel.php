<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php

if (isset($_POST['add_admin'])) {

    manage("INSERT INTO admin(lastname,firstname,middlename,position,email,contact_number,created_at)
    VALUES(?,?,?,?,?,?,?)",array($_POST['lastname'],$_POST['firstname'],
    $_POST['middlename'],$_POST['position'],$_POST['email'],$_POST['contact_number'],
    date("Y-m-d h:i:s a")));

    $username=strtolower($_POST['firstname']);
    $username_final=str_replace(" ","_",$username);

    manage("INSERT INTO login_credentials(user_id,username,password,type,status,created_at,updated_at) 
                VALUES(?,?,?,?,?,?,?)",array($pdo->lastInsertId(),$username_final,"123456",1,1,date("Y-m-d H:i:s a"),date("Y-m-d H:i:s a")));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Personnel","ADD",
        "<details>
            <p>Add Personnel </p>
            <p>
                Name: ".$_POST['firstname']." ".$_POST['middlename']." ".$_POST['lastname']."<br>
                Position: ".$_POST['position']."<br>
                Username: ".$username."
            </p>
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Added Personnel','success');
    </script>";
}
?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Personnel
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <?php
                                            $name=array("Last Name"=>"lastname","First Name"=>"firstname","Middle Name"=>"middlename","Position"=>"position");
                                            foreach ($name as $name_key => $name_value) {
                                                echo "<div class='col-md-12'>
                                                    <div class='md-form'>
                                                        <div class='md-form'>
                                                            <i class='fas fa-user-circle prefix'></i>
                                                            <input class='form-control' type='text' name='".$name_value."' id='".$name_value."'>
                                                            <label for='".$name_value."'>".$name_key."</label>
                                                        </div>
                                                    </div>
                                                </div>";
                                            }
                                        ?>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-envelope prefix"></i>
                                                <input class="form-control" type="email" name="email" id="email">
                                                <label for="email">Email</label>   
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-phone prefix"></i>
                                                <input class="form-control" type="text" name="contact_number" id="contact_number">
                                                <label for="contact_number">Contact Number</label>   
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm" name="add_admin">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-8 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						View Personnel
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblCourses">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","Last Name,First Name,Middle Name,Position,Email,Contact Number,Actions");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_admin = retrieve("SELECT * FROM admin",array());
                                            for ($i=0; $i < count($disp_admin); $i++) { 
                                                $name=$disp_admin[$i]['firstname']." ".$disp_admin[$i]['lastname'];
                                            echo "<tr>
                                                    <td>".$disp_admin[$i]['lastname']."</td>
                                                    <td>".$disp_admin[$i]['firstname']."</td>
                                                    <td>".$disp_admin[$i]['middlename']."</td>
                                                    <td>".$disp_admin[$i]['position']."</td>
                                                    <td>".$disp_admin[$i]['email']."</td>
                                                    <td>".$disp_admin[$i]['contact_number']."</td>
                                                    <td>
                                                        <a class='m-1' href='admin-edit-user-control.php?id=".$disp_admin[$i]['id']."'>
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