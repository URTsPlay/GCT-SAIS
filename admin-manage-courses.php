<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php

if (isset($_POST['add_courses'])) {
    manage("INSERT INTO courses(course_code,course_name)
        VALUES(?,?)",array($_POST['course_code'],$_POST['course_name']));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Courses","ADD",
        "<details>
            <p>Add Course</p>
            <p>
                Code: ".$_POST['course_code']."<br>
                Name: ".$_POST['course_name']."
            </p>
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Added Courses','success');
    </script>";
}

if (isset($_POST['save_course'])) {
    manage("UPDATE courses 
        SET course_code=?, course_name=?, WHERE id=?",
    array($_POST['edit_courses_code'],
            $_POST['edit_courses_name'],$_POST['edit_courses_id']));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Courses","UPDATE",
        "<details>
            <p>Update Course</p>
            <p>Code: ".$_POST['edit_courses_code']."</p>
            <p>Name: ".$_POST['edit_courses_name']."</p>
        </details>",date("Y-m-d h:i:s a")));
    
    echo "<script type='module'>
            Swal.fire('Success','Updated Courses Successfully','success');
        </script>";
}
?>
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
                                    <button type="submit" class="btn btn-primary btn-sm" name="add_courses">Add</button>
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
                                            $disp_courses = retrieve("SELECT * FROM courses",array());
                                            for ($i=0; $i < count($disp_courses); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_courses[$i]['id']."</td>
                                                    <td>".$disp_courses[$i]['course_code']."</td>
                                                    <td>".$disp_courses[$i]['course_name']."</td>
                                                    <td>
                                                        <span class='m-1 view_courses' 
                                                            view_courses_id='".$disp_courses[$i]['id']."' 
                                                            view_courses_schoolid='".$disp_courses[$i]['course_code']."'
                                                            view_courses_lastname='".$disp_courses[$i]['course_name']."'
                                                            data-toggle='modal' data-target='#view_courses_modal'>
                                                            <i class='fas fa-eye hvr-pop'></i>
                                                        </span>
                                                        <span class='m-1 edit_courses' 
                                                                edit_courses_id='".$disp_courses[$i]['id']."' 
                                                                edit_courses_code='".$disp_courses[$i]['course_code']."'
                                                                edit_courses_name='".$disp_courses[$i]['course_name']."'
                                                                data-toggle='modal' data-target='#edit_courses_modal'>
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
        "pageLength":10,
		"order": [],
	});

    $(".edit_courses").click(function(){
		$("#edit_courses_id").val($(this).attr("edit_courses_id"));
		$("#edit_courses_code").val($(this).attr("edit_courses_code"));
		$("#edit_courses_name").val($(this).attr("edit_courses_name"));
		$("#edit_courses_modal").modal("show");
	});
})
</script>