<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
if (isset($_POST['add_subjects'])) {
    manage("INSERT INTO subjects(sub_name,sub_units,sub_lec_hours,sub_lab_hours)
        VALUES(?,?,?,?)",array($_POST['sub_name'],$_POST['sub_units'],$_POST['sub_lec_hours'],$_POST['sub_lab_hours']));
    echo "<script type='module'>
        Swal.fire('Success','Added Successfully','success');
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
                                                        <span class='m-1 view_student' 
                                                            view_student_id='".$disp_subjects[$i]['id']."' 
                                                            view_student_sub_name='".$disp_subjects[$i]['sub_name']."'
                                                            view_student_sub_units='".$disp_subjects[$i]['sub_units']."'
                                                            view_student_sub_lec_hours='".$disp_subjects[$i]['sub_lec_hours']."'
                                                            view_student_sub_lab_hours='".$disp_subjects[$i]['sub_lab_hours']."'
                                                            data-toggle='modal' data-target='#view_student_modal'>
                                                            <i class='fas fa-eye hvr-pop'></i>
                                                        </span>
                                                        <span class='m-1 edit_student' 
                                                                edit_student_id='".$disp_subjects[$i]['id']."' 
                                                                edit_student_sub_name='".$disp_subjects[$i]['sub_name']."'
                                                                edit_student_sub_units='".$disp_subjects[$i]['sub_units']."'
                                                                edit_student_sub_lec_hours='".$disp_subjects[$i]['sub_lec_hours']."'
                                                                edit_student_sub_lab_hours='".$disp_subjects[$i]['sub_lab_hours']."'
                                                                data-toggle='modal' data-target='#edit_student_modal'>
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
        "pageLength":5,
		"order": [],
	});
})
</script>