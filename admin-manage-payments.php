<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS - Student Ledger and Assessment"; ?>
<?php
if (isset($_POST['add_assessment'])) {
    $get_school_id = retrieve("SELECT * FROM students WHERE id=?",array($_POST['getStudents']));
    manage("INSERT INTO assessment(student_id,school_id,or_number,reg_gen_fee,nstp_fee,lab_fee,tuition_fee,school_year,
        particular,subtotal,total,date_assessed,created_at,updated_at)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
        array($_POST['getStudents'],$get_school_id[0]['schoolid'], $_POST['or_number'],$_POST['reg_gen_fee'],
        $_POST['nstp_fee'],$_POST['lab_fee'],$_POST['tuition_fee'],$_POST['school_year'],$_POST['particular'],
        $_POST['sub_total'],$_POST['total_fee'],date("Y-m-d"),date("Y-m-d h:i:s a"),date("Y-m-d h:i:s a")));
    

    //https://stackoverflow.com/questions/1762231/using-implode-to-combine-multiple-select
    if (isset($_REQUEST['getSubjects'])) {
        $subjects = implode(",",$_REQUEST['getSubjects']);
        manage("INSERT INTO assessment_subject(assessment_id,subjects_list) VALUES(?,?)",array($pdo->lastInsertId(),$subjects));
    }

        echo "<script type='module'>
        Swal.fire('Success','Payment Generated Successfully','success');
    </script>";
}

if (isset($_POST['save_assessment'])) {
    $get_school_id = retrieve("SELECT * FROM students WHERE id=?",array($_POST['edit_assessment_student_id']));
    manage("UPDATE assessment SET student_id=?, school_id=?, reg_gen_fee=?, 
    nstp_fee=?, lab_fee=?, tuition_fee=?, total=?, updated_at=? WHERE id=?",
    array($_POST['edit_assessment_student_id'],$get_school_id[0]['schoolid'],$_POST['edit_assessment_reg_gen_fee'],
    $_POST['edit_assessment_nstp_fee'],$_POST['edit_assessment_lab_fee'],$_POST['edit_assessment_tuition_fee'],
    $_POST['update_total_fee'],date("Y-m-d h:i:s a"),$_POST['edit_assessment_id']));

    echo "<script type='module'>
        Swal.fire('Success','Updated Assessment Successfully','success');
    </script>";
}

if (isset($_POST['save_payment'])) {
    $get_amount = retrieve("SELECT * FROM assessment WHERE id=?",array($_POST['pay_assessment_id']));
    $payment_total=$get_amount[0]['subtotal'];
    $payment_amount=$_POST['payment_amount'];
    $balance = $payment_total - $payment_amount;
    manage("INSERT INTO payments(assessment_id,total,amount,balance,date_paid,created_at)
    VALUES(?,?,?,?,?,?)",array($_POST['pay_assessment_id'],$payment_total,
    $payment_amount,$balance,date("Y-m-d"),date("Y-m-d h:i:s a")));

    echo "<script type='module'>
        Swal.fire('Success','Payment Paid','success');
    </script>";
}
?>
<style>
.or_div {
  height: 40px; width: 186px; text-align: center; font-size: 28px;
  color: black; background-color: #1E88E5; font-family: "Courier New"; font-weight: bold;
}
.sub_total_div,.total_div {
  height: 40px; width: 186px; text-align: center; font-size: 28px;
  color: black; background-color: #1E88E5; font-family: "Courier New"; font-weight: bold;
}

.update_total_div,.up_date_sub_total_div {
  height: 40px; width: 186px; text-align: center; font-size: 28px;
  color: black; background-color: #1E88E5; font-family: "Courier New"; font-weight: bold;
}
</style>
<?php $page_title="GCT SAIS"; ?>
<div class="row mx-auto mt-3">
    <h1 class="mr-auto ml-auto">Student Ledger and Assessment</h1>
	<div class="col-md-12 mt-2">
		<div class="row">
			<div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Assessment
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <small class="ml-3">Note: Enter 0 if the field doesn't exist</small>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-hashtag prefix"></i>
                                                <input class="form-control" type="text" name="or_number" id="or_number" required>
                                                <label for="or_number">OR Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="getSubjects[]" id="getSubjects" multiple>
                                                    <option value="">Select Subjects</option>
                                                    <?php
                                                        $getSubjects=retrieve("SELECT * FROM subjects",array());
                                                        for ($i=0; $i < COUNT($getSubjects); $i++) { 
                                                            echo "<option value=".$getSubjects[$i]['sub_name'].">".$getSubjects[$i]['sub_name']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="reg_gen_fee" id="reg_gen_fee" required>
                                                <label for="reg_gen_fee">Registration/Gen. Fee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="lab_fee" id="lab_fee" required>
                                                <label for="lab_fee">Laboratory Fee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="nstp_fee" id="nstp_fee" required>
                                                <label for="nstp_fee">NSTP Fee</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="particular" id="particular">
                                                    <option value="">Select Particular</option>
                                                    <option value="1">1st Sem</option>
                                                    <option value="2">2nd sem</option>    
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="school_year" id="school_year">
                                                    <option value="">Select School Year</option>
                                                    <?php
                                                        $date2=date('Y', strtotime('+1 Years'));
                                                        for($i=date('Y'); $i<$date2+6;$i++){
                                                            echo "<option value='".$i."-".($i+1)."'>".$i."-".($i+1)."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="sub_total">Sub Total</label>
                                            <input class="sub_total_div ml-3" type="text" id="sub_total" name="sub_total" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="tuition_fee" id="tuition_fee">
                                                <label for="tuition_fee">Tuition Fee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sub_total">Total</label>
                                            <input class="total_div ml-3" type="text" id="total_fee" name="total_fee" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-md mt-4" name="add_assessment">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-7 mb-2">
				<div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header p-2 bg-primary text-white">
                                Manage Assessment
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblassessment">
                                            <thead>
                                                <tr>
                                                    <?php
                                                        $stud_head=explode(",","No,OR Number,Name,Subjects,Registration Fee,NSTP Fee,Lab Fee,Tuition Fee,School Year,Particular,Subtotal,Total,Action");
                                                        foreach($stud_head as $stud_val)
                                                        {
                                                            echo "<th>".$stud_val."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $disp_assessment = retrieve("SELECT
                                                    assessment.student_id AS student_id,
                                                    assessment.id AS assessment_id, assessment.or_number AS or_number,
                                                    CONCAT_WS(' ', students.firstname, students.lastname) fullname, assessment.reg_gen_fee AS reg_gen_fee,
                                                    assessment.nstp_fee AS nstp_fee, assessment.lab_fee AS lab_fee,
                                                    assessment.tuition_fee AS tuition_fee,
                                                    assessment.school_year AS school_year,
                                                    assessment.particular AS particular,
                                                    assessment.subtotal AS subtotal,
                                                    assessment.total AS total FROM assessment INNER JOIN students WHERE students.id=assessment.student_id",array());
                                                    for ($i=0; $i < count($disp_assessment); $i++) { 
                                                        $get_subjects = retrieve("SELECT * FROM assessment_subject WHERE assessment_id=?",array($disp_assessment[$i]['assessment_id']));
                                                    echo "<tr>  
                                                            <td>".$disp_assessment[$i]['assessment_id']."</td>
                                                            <td>".$disp_assessment[$i]['or_number']."</td>
                                                            <td>".$disp_assessment[$i]['fullname']."</td>
                                                            <td>".$get_subjects[0]['subjects_list']."</td>
                                                            <td>".$disp_assessment[$i]['reg_gen_fee']."</td>
                                                            <td>".$disp_assessment[$i]['nstp_fee']."</td>
                                                            <td>".$disp_assessment[$i]['lab_fee']."</td>
                                                            <td>".$disp_assessment[$i]['tuition_fee']."</td>
                                                            <td>".$disp_assessment[$i]['school_year']."</td>
                                                            <td>".($disp_assessment[$i]['particular']==1 ? "1st SEM" : "2nd SEM")."</td>
                                                            <td>".$disp_assessment[$i]['subtotal']."</td>
                                                            <td>".$disp_assessment[$i]['total']."</td>
                                                            <td>
                                                                <span class='m-1 edit_assessment' title='Edit'
                                                                        edit_assessment_id='".$disp_assessment[$i]['assessment_id']."' 
                                                                        edit_assessment_student_id='".$disp_assessment[$i]['student_id']."'
                                                                        edit_assessment_reg_gen_fee='".$disp_assessment[$i]['reg_gen_fee']."'
                                                                        edit_assessment_nstp_fee='".$disp_assessment[$i]['nstp_fee']."'
                                                                        edit_assessment_lab_fee='".$disp_assessment[$i]['lab_fee']."'
                                                                        edit_assessment_tuition_fee='".$disp_assessment[$i]['tuition_fee']."'
                                                                        data-toggle='modal' data-target='#edit_assessment_modal'>
                                                                    <i class='fas fa-pencil hvr-pop'></i>
                                                                </span>
                                                                <span class='m-1 pay_assessment' title='Pay Now'
                                                                        pay_assessment_id='".$disp_assessment[$i]['assessment_id']."'
                                                                        disp_or_number='".$disp_assessment[$i]['or_number']."'
                                                                        data-toggle='modal' data-target='#payments_modal'>
                                                                    <i class='fas fa-credit-card hvr-pop'></i>
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
                    <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header p-2 bg-primary text-white">
                                Manage Payments
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblpayments">
                                            <thead>
                                                <tr>
                                                    <?php
                                                        $stud_head=explode(",","ID,OR Number,Name,Previous Balance,Credit,Current Balance,Date Paid,Action");
                                                        foreach($stud_head as $stud_val)
                                                        {
                                                            echo "<th>".$stud_val."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $disp_payments = retrieve("SELECT
                                                    payments.id AS payment_id,
                                                    assessment.or_number AS or_number,
                                                    CONCAT_WS(' ', students.firstname, students.lastname) stud_name,
                                                    payments.amount AS amount_paid,
                                                    payments.balance AS balance,
                                                    payments.date_paid AS date_paid,
                                                    payments.total AS total,
                                                    payments.amount AS amount,
                                                    payments.date_paid AS date_paid,
                                                    SUM(payments.total - payments.amount) OVER (PARTITION BY assessment.or_number ORDER BY payments.date_paid) AS balance
                                                    FROM payments 
                                                    INNER JOIN assessment ON payments.assessment_id=assessment.id
                                                    INNER JOIN students ON students.id=assessment.student_id
                                                    ORDER BY payments.date_paid",array());
                                                    for ($i=0; $i < count($disp_payments); $i++) { 
                                                    echo "<tr>
                                                            <td>".$disp_payments[$i]['payment_id']."</td>
                                                            <td>".$disp_payments[$i]['or_number']."</td>
                                                            <td>".$disp_payments[$i]['stud_name']."</td>
                                                            <td>".$disp_payments[$i]['total']."</td>
                                                            <td>".$disp_payments[$i]['amount_paid']."</td>
                                                            <td>".$disp_payments[$i]['balance']."</td>
                                                            <td>".$disp_payments[$i]['date_paid']."</td>
                                                            <td>
                                                                <span class='m-1 edit_payments' title='Edit'
                                                                        edit_payments_id='".$disp_payments[$i]['payment_id']."'
                                                                        data-toggle='modal' data-target='#edit_payments_modal'>
                                                                    <i class='fas fa-pencil hvr-pop'></i>
                                                                </span>
                                                                <span class='m-1 pay_payments' title='Pay Now'
                                                                        pay_payments_id='".$disp_payments[$i]['payment_id']."'
                                                                        disp_or_number='".$disp_payments[$i]['or_number']."'
                                                                        data-toggle='modal' data-target='#payments_modal'>
                                                                    <i class='fas fa-credit-card hvr-pop'></i>
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
        
        <div class="row">
            <div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Examination
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="getStudentsExam" id="getStudentsExam" searchable="Search here..">
                                                    <option value="">Select Student</option>
                                                    <?php
                                                        $getStudentsExam=retrieve("SELECT * FROM students ORDER BY lastname ASC",array());
                                                        for ($i=0; $i < COUNT($getStudentsExam); $i++) { 
                                                            echo "<option value=".$getStudentsExam[$i]['id'].">".$getStudentsExam[$i]['lastname'].", ".$getStudentsExam[$i]['firstname']." ".$getStudents[$i]['middlename']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <select class="mdb-select md-form" name="exam_type" id="exam_type">
                                                    <option value="">Select Exam Type</option>
                                                    <?php
                                                        $exam_type=array("Prelim"=>"1","Midterm"=>"2","Pre-Final"=>"3","Final"=>"4");
                                                        foreach ($exam_type as $exam_key => $exam_value) {
                                                            echo "<option value='".$exam_value."'>".$exam_key."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

    // tooltip initialization
	$('[data-toggle="tooltip"]').tooltip();
	// popovers Initialization
	$('[data-toggle="popover"]').popover();
	// sidenav initialization
	$(".button-collapse").sideNav();

    $("#reg_gen_fee").keyup(function(){
        updateSubTotal();
    });

    $("#lab_fee").keyup(function(){
        updateSubTotal();
    });

    $("#nstp_fee").keyup(function(){
        updateSubTotal();
    });

    var updateSubTotal = function(){
        var reg_gen_fee = parseInt($("#reg_gen_fee").val());
        var lab_fee = parseInt($("#lab_fee").val());
        var nstp_fee = parseInt($("#nstp_fee").val());
        $("#sub_total").val(reg_gen_fee + lab_fee + nstp_fee);
    }

    $("#tuition_fee").keyup(function(){
        updateTotal();
    });

    var updateTotal = function(){
        var tuition_fee = parseInt($("#tuition_fee").val());
        var sub_total = parseInt($("#sub_total").val());
        $("#total_fee").val(tuition_fee + sub_total);
    }

    $("#edit_assessment_reg_gen_fee").keyup(function(){
        editUpdateSubTotal();
    });

    $("#edit_assessment_lab_fee").keyup(function(){
        editUpdateSubTotal();
    });

    $("#edit_assessment_nstp_fee").keyup(function(){
        editUpdateSubTotal();
    });

    var editUpdateSubTotal = function(){
        var reg_gen_fee = parseInt($("#edit_assessment_reg_gen_fee").val());
        var lab_fee = parseInt($("#edit_assessment_lab_fee").val());
        var nstp_fee = parseInt($("#edit_assessment_nstp_fee").val());
        
        $("#update_sub_total").val(reg_gen_fee + lab_fee + nstp_fee);
    }

    $("#edit_assessment_tuition_fee").keyup(function(){
        editUpdateTotal();
    });

    var editUpdateTotal = function(){
        var tuition_fee = parseInt($("#edit_assessment_tuition_fee").val());
        var sub_total = parseInt($("#update_sub_total").val());
        $("#update_total_fee").val(tuition_fee + sub_total);
    }


    $("#tblassessment").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
	});

    $("#tblpayments").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
	});

    $('.mdb-select').materialSelect();
    // var or_number = Math.floor(100000 + Math.random() * 900000);
    // $("#or_number").val(or_number);

    $(".edit_assessment").click(function(){
		$("#edit_assessment_id").val($(this).attr("edit_assessment_id"));
        $("#edit_assessment_student_id").val($(this).attr("edit_assessment_student_id"));
		$("#edit_assessment_reg_gen_fee").val($(this).attr("edit_assessment_reg_gen_fee"));
		$("#edit_assessment_lab_fee").val($(this).attr("edit_assessment_lab_fee"));
        $("#edit_assessment_nstp_fee").val($(this).attr("edit_assessment_nstp_fee"));
		$("#edit_assessment_tuition_fee").val($(this).attr("edit_assessment_tuition_fee"));
		$("#edit_assessment_modal").modal("show");
	});

    $(".pay_assessment").click(function(){
        $("#disp_or_number").text($(this).attr("disp_or_number"));
		$("#pay_assessment_id").val($(this).attr("pay_assessment_id"));
		$("#payments_modal").modal("show");
	});
})
</script>