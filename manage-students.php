<?php  include("includes/header.php");  ?>
<?php $page_title="GCT SAIS"; ?>
<?php
date_default_timezone_set("Asia/Manila");
if (isset($_POST['submit'])) {

    manage("INSERT INTO students(schoolid,lastname,firstname,middlename,course,year) 
            VALUES(?,?,?,?,?,?)",
        array($_POST['schoolid'],$_POST['lastname'],$_POST['firstname'],
        $_POST['middlename'],$_POST['course'],$_POST['year']));

    echo "<script type='module'>
			Swal.fire('Success','Added Students Successfully','success');
		</script>";

}

?>
<?php include('includes/navigation.php'); ?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Students
					</div>
				<div class="col-md-12">
                    <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblStudents">
                        <thead>
                           <tr>
                            <?php
                                $stud_head=explode(",","No,School ID,Last Name,First Name,Middle Name,Course,Year,Actions");
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
                            echo "<tr>
                                <td>".$disp_students[$i]['id']."</td>
                                <td>".$disp_students[$i]['schoolid']."</td>
                                <td>".$disp_students[$i]['lastname']."</td>
                                <td>".$disp_students[$i]['firstname']."</td>
                                <td>".$disp_students[$i]['middlename']."</td>
                                <td>".$disp_students[$i]['course']."</td>
                                <td>".$disp_students[$i]['year']."</td>
                                <td>
                                    <span class='m-1 view_student'>
                                        <i class='fas fa-eye hvr-pop'></i>
                                    </span>
									<span class='m-1 edit_student' 
                                        edit_student_id='".$disp_students[$i]['id']."' 
                                        edit_student_schoolid='".$disp_students[$i]['schoolid']."'
                                        edit_student_lastname='".$disp_students[$i]['lastname']."'
                                        edit_student_firstname='".$disp_students[$i]['firstname']."'
                                        edit_student_middlename='".$disp_students[$i]['middlename']."'
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