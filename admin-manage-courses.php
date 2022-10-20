<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Courses
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <div class="md-form">
                                                    <i class="fas fa-hashtag prefix"></i>
                                                    <input class="form-control" type="text" name="course_code" id="course_code">
                                                    <label for="course_code">Course Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-pencil prefix"></i>
                                                <input class="form-control" type="text" name="course_name" id="course_name">
                                                <label for="course_name">Course Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm" name="add_monitor">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-7 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Courses
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblCourses">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,Course Code,Code Description,Action");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_students = retrieve("SELECT * FROM courses",array());
                                            for ($i=0; $i < count($disp_students); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_students[$i]['id']."</td>
                                                    <td>".$disp_students[$i]['course_code']."</td>
                                                    <td>".$disp_students[$i]['course_name']."</td>
                                                    <td>
                                                        <span class='m-1 view_student' 
                                                            view_student_id='".$disp_students[$i]['id']."' 
                                                            view_student_schoolid='".$disp_students[$i]['course_code']."'
                                                            view_student_lastname='".$disp_students[$i]['course_name']."'
                                                            data-toggle='modal' data-target='#view_student_modal'>
                                                            <i class='fas fa-eye hvr-pop'></i>
                                                        </span>
                                                        <span class='m-1 edit_student' 
                                                                edit_student_id='".$disp_students[$i]['id']."' 
                                                                edit_student_schoolid='".$disp_students[$i]['course_code']."'
                                                                edit_student_lastname='".$disp_students[$i]['course_name']."'
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
    $("#tblCourses").DataTable({
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