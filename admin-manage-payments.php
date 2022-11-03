<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
if (isset($_POST['add_payments'])) {
    manage("INSERT INTO payments(student_id,or_number,reg_gen_fee,lab_fee,tuition_fee)
        VALUES(?,?,?,?,?)",
        array($_POST['getStudents'],$_POST['or_number'],
                $_POST['reg_gen_fee'],$_POST['lab_fee'],$_POST['tuition_fee']));
    echo "<script type='module'>
        Swal.fire('Success','Added Successfully','success');
    </script>";
}
?>
<style>
.or_div {
  height: 40px; width: 186px; text-align: center; font-size: 28px;
  color: black; background-color: gray; font-family: "Courier New"; font-weight: bold;
}
</style>
<?php $page_title="GCT SAIS"; ?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
			<div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Payments
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <label for="or_number">OR Number</label>
                                        <input class="or_div ml-3" type="text" id="or_number" name="or_number" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="getStudents" id="getStudents" searchable="Search here..">
                                                    <option value="">Select Student</option>
                                                    <?php
                                                        $getStudents=retrieve("SELECT * FROM students ORDER BY lastname ASC",array());
                                                        for ($i=0; $i < COUNT($getStudents); $i++) { 
                                                            echo "<option value=".$getStudents[$i]['id'].">".$getStudents[$i]['lastname'].", ".$getStudents[$i]['firstname']." ".$getStudents[$i]['middlename']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-none">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="getSubjects" id="getSubjects" multiple>
                                                    <option value="">Select Subjects</option>
                                                    <?php
                                                        $getSubjects=retrieve("SELECT * FROM payments",array());
                                                        for ($i=0; $i < COUNT($getSubjects); $i++) { 
                                                            echo "<option value=".$getSubjects[$i]['sub_name'].">".$getSubjects[$i]['sub_name']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="reg_gen_fee" id="reg_gen_fee">
                                                <label for="reg_gen_fee">Registration/Gen. Fee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="lab_fee" id="lab_fee">
                                                <label for="lab_fee">Laboratory Fee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="tuition_fee" id="tuition_fee">
                                                <label for="tuition_fee">Tuition Fee</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-md" name="add_payments">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-7 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Payments
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                            <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblPayments">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,OR Number,Name,Registration Fee,Lab Fee, Tuition Fee,Action");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_payments = retrieve("SELECT * FROM payments INNER JOIN students WHERE students.id=payments.student_id",array());
                                            for ($i=0; $i < count($disp_payments); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_payments[$i]['id']."</td>
                                                    <td>".$disp_payments[$i]['or_number']."</td>
                                                    <td>".$disp_payments[$i]['firstname']." ".$disp_payments[$i]['lastname']."</td>
                                                    <td>".$disp_payments[$i]['reg_gen_fee']."</td>
                                                    <td>".$disp_payments[$i]['lab_fee']."</td>
                                                    <td>".$disp_payments[$i]['tuition_fee']."</td>
                                                    <td>
                                                        <span class='m-1 edit_payments' 
                                                                edit_payments_id='".$disp_payments[$i]['id']."' 
                                                                edit_payments_sub_name='".$disp_payments[$i]['or_number']."'
                                                                edit_payments_sub_units='".$disp_payments[$i]['reg_gen_fee']."'
                                                                edit_payments_sub_lec_hours='".$disp_payments[$i]['lab_fee']."'
                                                                edit_payments_sub_lab_hours='".$disp_payments[$i]['tuition_fee']."'
                                                                data-toggle='modal' data-target='#edit_payments_modal'>
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
    $("#tblPayments").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
	});
    $('.mdb-select').materialSelect();
    var or_number = Math.floor(100000 + Math.random() * 900000);
    $("#or_number").val(or_number);
})
</script>