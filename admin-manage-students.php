<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
date_default_timezone_set("Asia/Manila");

if (isset($_POST['save_student'])) {
    manage("UPDATE students SET isscholar=?, scholarship_type=? WHERE id=?",
    array($_POST['edit_student_isscholar'], $_POST['edit_student_sholarship_type'], $_POST['edit_student_id']));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
    array($admin_username,"Admin","Manage Students","UPDATE",
        "<details>
            <p>Update Student</p>
            <p>
                Is Scholar: ".$_POST['edit_student_isscholar']."<br>
                Scholarship Type: ".$_POST['edit_student_sholarship_type'].
            "</p>
        </details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
			Swal.fire('Success','Updated Students Successfully','success');
		</script>";
}

?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Students
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblStudents">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,School ID,Last Name,First Name,Middle Name,Email,Contact Number,Course,Year,Is Scholar, Scholarship Type,Action");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_students = retrieve("SELECT * FROM students",array());
                                            for ($i=0; $i < count($disp_students); $i++) { 
                                                $disp_scholarship_type = retrieve("SELECT * FROM scholarship WHERE id=?",array($disp_students[$i]['scholarship_type']));
                                            echo "<tr>
                                                    <td>".$disp_students[$i]['id']."</td>
                                                    <td>".$disp_students[$i]['schoolid']."</td>
                                                    <td>".$disp_students[$i]['lastname']."</td>
                                                    <td>".$disp_students[$i]['firstname']."</td>
                                                    <td>".$disp_students[$i]['middlename']."</td>
                                                    <td>".$disp_students[$i]['email']."</td>
                                                    <td>".$disp_students[$i]['contact_number']."</td>
                                                    <td>".$disp_students[$i]['course']."</td>
                                                    <td>".$disp_students[$i]['year']."</td>
                                                    <td>".($disp_students[$i]['isscholar']==1 ? 'Yes' : 'No')."</td>
                                                    <td>".$disp_scholarship_type[0]['scholarship_name']."</td>
                                                    <td>
                                                        <span class='m-1 edit_student'
                                                                edit_student_id=".$disp_students[$i]['id']."
                                                                edit_student_isscholar='".$disp_students[$i]['isscholar']."'
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

    var isscholar;
    $(".edit_student").click(function(){
        $("#edit_student_id").val($(this).attr("edit_student_id"));
        $("#edit_student_isscholar").val($(this).attr("edit_student_isscholar"));
    });

    $("#edit_student_isscholar").change(function(){
        if ($("#edit_student_isscholar").val() == 1) {
            $(".d-none").removeClass();
        } else {
            $(".d-none").addClass();
        }
    });

    // var url = "data/courses.json";
    // $.getJSON(url, function (data) {
    //     $.each(data, function (index, value) {
    //         $('#edit_course').append('<option value="' + value.course_code + '">' + value.course_name + '</option>');
    //     });
    // });
});
</script>