<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
if (isset($_POST['add_subjects'])) {
    manage("INSERT INTO subjects(sub_name,sub_units,sub_lec_hours,sub_lab_hours)
        VALUES(?,?,?,?)",array($_POST['sub_name'],$_POST['sub_units'],$_POST['sub_lec_hours'],$_POST['sub_lab_hours']));
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Subjects","Create Subject",
        "<details>
            <p>Subject Creation</p>
            <p>Name: ".$_POST['sub_name']."</p>
            <p>Units: ".$_POST['sub_units']."</p>
            <p>Lecture Hours: ".$_POST['sub_lec_hours']."</p>
            <p>Laboratory Hours: ".$_POST['sub_lab_hours']."</p>
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Added Successfully','success');
    </script>";
}

if (isset($_POST['save_subject'])) {
    manage("UPDATE subjects 
        SET sub_name=?, sub_units=?, sub_lec_hours=?,
        sub_lab_hours=? WHERE id=?",
    array($_POST['edit_subjects_sub_name'],
            $_POST['edit_subjects_sub_units'],
            $_POST['edit_subjects_sub_lec_hours'],
            $_POST['edit_subjects_sub_lab_hours'],$_POST['edit_subjects_id']));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Subjects","Edit Subject",
        "<details>
            <p>Subject Editing</p>
            <p>Name: ".$_POST['edit_subjects_sub_name']."</p>
            <p>Units: ".$_POST['edit_subjects_sub_units']."</p>
            <p>Lecture Hours: ".$_POST['edit_subjects_sub_lec_hours']."</p>
            <p>Laboratory Hours: ".$_POST['edit_subjects_sub_lab_hours']."</p>
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
            Swal.fire('Success','Updated Subjects Successfully','success');
        </script>";
}
?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Subjects
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <div class="md-form">
                                                    <i class="fas fa-book prefix"></i>
                                                    <input class="form-control" type="text" name="sub_name" id="sub_name">
                                                    <label for="sub_name">Subject</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-hashtag prefix"></i>
                                                <input class="form-control" type="number" name="sub_units" id="sub_units">
                                                <label for="sub_units">Units</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-clock prefix"></i>
                                                <input class="form-control" type="text" name="sub_lec_hours" id="sub_lec_hours">
                                                <label for="sub_lec_hours">Lecture Hours</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-clock prefix"></i>
                                                <input class="form-control" type="text" name="sub_lab_hours" id="sub_lab_hours">
                                                <label for="sub_lab_hours">Lab Hours</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md" name="add_subjects">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-7 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Subjects
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblSubjects">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,Subject,Units,Lecture Hours,Lab Hours,Action");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_subjects = retrieve("SELECT * FROM subjects",array());
                                            for ($i=0; $i < count($disp_subjects); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_subjects[$i]['id']."</td>
                                                    <td>".$disp_subjects[$i]['sub_name']."</td>
                                                    <td>".$disp_subjects[$i]['sub_units']."</td>
                                                    <td>".$disp_subjects[$i]['sub_lec_hours']."</td>
                                                    <td>".$disp_subjects[$i]['sub_lab_hours']."</td>
                                                    <td>
                                                        <span class='m-1 view_subjects' 
                                                            view_subjects_id='".$disp_subjects[$i]['id']."' 
                                                            view_subjects_sub_name='".$disp_subjects[$i]['sub_name']."'
                                                            view_subjects_sub_units='".$disp_subjects[$i]['sub_units']."'
                                                            view_subjects_sub_lec_hours='".$disp_subjects[$i]['sub_lec_hours']."'
                                                            view_subjects_sub_lab_hours='".$disp_subjects[$i]['sub_lab_hours']."'
                                                            data-toggle='modal' data-target='#view_subjects_modal'>
                                                            <i class='fas fa-eye hvr-pop'></i>
                                                        </span>
                                                        <span class='m-1 edit_subjects' 
                                                                edit_subjects_id='".$disp_subjects[$i]['id']."' 
                                                                edit_subjects_sub_name='".$disp_subjects[$i]['sub_name']."'
                                                                edit_subjects_sub_units='".$disp_subjects[$i]['sub_units']."'
                                                                edit_subjects_sub_lec_hours='".$disp_subjects[$i]['sub_lec_hours']."'
                                                                edit_subjects_sub_lab_hours='".$disp_subjects[$i]['sub_lab_hours']."'
                                                                data-toggle='modal' data-target='#edit_subjects_modal'>
                                                            <i class='fas fa-pencil hvr-pop'></i>
                                                        </span>
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
<?php include('includes/modal.php') ?>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $('.mdb-select').materialSelect();
    $("#tblSubjects").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [],
	});

    $(".edit_subjects").click(function(){
		$("#edit_subjects_id").val($(this).attr("edit_subjects_id"));
		$("#edit_subjects_sub_name").val($(this).attr("edit_subjects_sub_name"));
		$("#edit_subjects_sub_units").val($(this).attr("edit_subjects_sub_units"));
		$("#edit_subjects_sub_lec_hours").val($(this).attr("edit_subjects_sub_lec_hours"));
		$("#edit_subjects_sub_lab_hours").val($(this).attr("edit_subjects_sub_lab_hours"));
		$("#edit_subjects_modal").modal("show");
	});
    
})
</script>