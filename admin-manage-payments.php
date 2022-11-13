<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
if (isset($_POST['add_assessment'])) {
    manage("INSERT INTO assessment(student_id,or_number,reg_gen_fee,nstp_fee,lab_fee,tuition_fee,total,payment_status,created_at,updated_at)
        VALUES(?,?,?,?,?,?,?,?,?,?)",
        array($_POST['getStudents'],$_POST['or_number'],$_POST['reg_gen_fee'],
            $_POST['nstp_fee'],$_POST['lab_fee'],$_POST['tuition_fee'],$_POST['total_fee'],0,date("Y-m-d h:i:s a"),date("Y-m-d h:i:s a")));
    echo "<script type='module'>
        Swal.fire('Success','Payment Generated Successfully','success');
    </script>";
}

if (isset($_POST['save_payment'])) {
    $payment_total = $_POST['payment_total'];
    $payment_amount =  $_POST['payment_amount'];
    $total_left = $payment_amount - $payment_total;
    manage("INSERT INTO payments(assessment_id,total,amount,total_left,date_paid,created_at)
    VALUES(?,?,?,?,?,?)",array($_POST['pay_assessment_id'],$payment_total,
    $payment_amount,$total_left,date("Y-m-d"),date("Y-m-d h:i:s a")));

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
</style>
<?php $page_title="GCT SAIS"; ?>
<div class="row mx-auto mt-3">
    <h1 class="mr-auto ml-auto">Payment Management</h1>
	<div class="col-md-12 mt-2">
		<div class="row">
			<div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Payment
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
                                                            echo "<option value=".$getStudents[$i]['schoolid'].">".$getStudents[$i]['lastname'].", ".$getStudents[$i]['firstname']." ".$getStudents[$i]['middlename']."</option>";
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
                                                        $getSubjects=retrieve("SELECT * FROM assessment",array());
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
                                                <input class="form-control" type="text" name="nstp_fee" id="nstp_fee">
                                                <label for="nstp_fee">NSTP Fee</label>
                                                <small>Note: Enter 0 if this field doesn't existing</small>
                                            </div>
                                        </div>
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
                                        <button type="submit" class="btn btn-primary btn-md" name="add_assessment">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-8 mb-2">
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
                                                        $stud_head=explode(",","No,OR Number,Name,Registration Fee,NSTP Fee,Lab Fee,Tuition Fee,Total,Action");
                                                        foreach($stud_head as $stud_val)
                                                        {
                                                            echo "<th>".$stud_val."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $disp_assessment = retrieve("SELECT * FROM assessment INNER JOIN students WHERE students.schoolid=assessment.student_id",array());
                                                    for ($i=0; $i < count($disp_assessment); $i++) { 
                                                    echo "<tr>
                                                            <td>".$disp_assessment[$i]['id']."</td>
                                                            <td>".$disp_assessment[$i]['or_number']."</td>
                                                            <td>".$disp_assessment[$i]['firstname']." ".$disp_assessment[$i]['lastname']."</td>
                                                            <td>".$disp_assessment[$i]['reg_gen_fee']."</td>
                                                            <td>".$disp_assessment[$i]['nstp_fee']."</td>
                                                            <td>".$disp_assessment[$i]['lab_fee']."</td>
                                                            <td>".$disp_assessment[$i]['tuition_fee']."</td>
                                                            <td>".$disp_assessment[$i]['total']."</td>
                                                            <td>
                                                                <span class='m-1 edit_assessment' title='Edit   '
                                                                        edit_assessment_id='".$disp_assessment[$i]['id']."' 
                                                                        edit_assessment_reg_gen_fee='".$disp_assessment[$i]['reg_gen_fee']."'
                                                                        edit_assessment_nstp_fee='".$disp_assessment[$i]['nstp_fee']."'
                                                                        edit_assessment_lab_fee='".$disp_assessment[$i]['lab_fee']."'
                                                                        edit_assessment_tuition_fee='".$disp_assessment[$i]['tuition_fee']."'
                                                                        data-toggle='modal' data-target='#edit_assessment_modal'>
                                                                    <i class='fas fa-pencil hvr-pop'></i>
                                                                </span>
                                                                <span class='m-1 pay_assessment' title='Pay Now'
                                                                        pay_assessment_id='".$disp_assessment[$i]['id']."'
                                                                        payment_total='".$disp_assessment[$i]['total']."'
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
                                                        $stud_head=explode(",","No,OR Number,Name,Registration Fee,NSTP Fee,Lab Fee,Tuition Fee,Action");
                                                        foreach($stud_head as $stud_val)
                                                        {
                                                            echo "<th>".$stud_val."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $disp_payments = retrieve("SELECT * FROM payments 
                                                                    INNER JOIN assessment ON assessment.id=payments.assessment_id
                                                                    INNER JOIN students ON students.id=assessment.student_id",array());
                                                    for ($i=0; $i < count($disp_payments); $i++) { 
                                                    echo "<tr>
                                                            <td>".$disp_payments[$i]['id']."</td>
                                                            <td>".$disp_payments[$i]['or_number']."</td>
                                                            <td>".$disp_payments[$i]['firstname']." ".$disp_payments[$i]['lastname']."</td>
                                                            <td>".$disp_payments[$i]['total']."</td>
                                                            <td>".$disp_payments[$i]['amount']."</td>
                                                            <td>".$disp_payments[$i]['date_paid']."</td>
                                                            <td>
                                                                <span class='m-1 edit_payments' title='Edit   '
                                                                        edit_payments_id='".$disp_payments[$i]['id']."' 
                                                                        edit_payments_reg_gen_fee='".$disp_payments[$i]['reg_gen_fee']."'
                                                                        edit_payments_nstp_fee='".$disp_payments[$i]['nstp_fee']."'
                                                                        edit_payments_lab_fee='".$disp_payments[$i]['lab_fee']."'
                                                                        edit_payments_tuition_fee='".$disp_payments[$i]['tuition_fee']."'
                                                                        data-toggle='modal' data-target='#edit_payments_modal'>
                                                                    <i class='fas fa-pencil hvr-pop'></i>
                                                                </span>
                                                                <span class='m-1 pay_payments' title='Pay Now'
                                                                        pay_payments_id='".$disp_payments[$i]['id']."'
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
	</div>
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
    var or_number = Math.floor(100000 + Math.random() * 900000);
    $("#or_number").val(or_number);

    $(".edit_assessment").click(function(){
		$("#edit_assessment_id").val($(this).attr("edit_assessment_id"));
        $("#payment_total").val($(this).attr("payment_total"));
		$("#edit_assessment_reg_gen_fee").val($(this).attr("edit_assessment_reg_gen_fee"));
		$("#edit_assessment_lab_fee").val($(this).attr("edit_assessment_lab_fee"));
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