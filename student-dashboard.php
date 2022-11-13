<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-3">
    <div class="page-header">
        <h1>Hello, <?php echo $student_name; ?></h1>
        <p class="font-weight-bold"><?php echo $course."-".$year; ?></p>
        <hr>
	</div>
    <div class="row mx-auto mt-3">
        <div class="col-md-6">
            <?php
                $check_payments=retrieve("SELECT COUNT(*) AS count_assessments FROM assessment WHERE student_id=?",array($student_schoolid));
                if (!$check_payments[0]['count_assessments'] > 0) {
                    ?>
                    <div class="card">
                        <div class="card-header bg-primary text-white">Assessments</div>
                            <div class="card-body">
                                <h6 class="text-center">No Payments as of today <?php echo date("F d, Y") ?></h6>
                            </div>
                        </div>
                    <?php
                } else {
                    ?>
                    <div class="card">
                        <div class="card-header bg-primary text-white">Assessments</div>
                        <div class="card-body">
                            <?php
                                $get_payments=retrieve("SELECT * FROM assessment WHERE student_id=?",array($student_schoolid));
                                echo "
                                    <h5>OR Number: ".$get_payments[0]['or_number']."</h5>
                                    <hr>
                                    <h5>Registration/Gen Fee: ".$get_payments[0]['reg_gen_fee']."</h5>
                                    <h5>NSTP Fee: ".$get_payments[0]['nstp_fee']."</h5>
                                    <h5>Lab Fee: ".$get_payments[0]['lab_fee']."</h5>
                                    <h5>Tuition Fee: ".$get_payments[0]['tuition_fee']."</h5>
                                    <h5>Total: <span class='badge badge-primary' style='font-size:24px'>".$get_payments[0]['total']."</span></h5>
                                ";
                            ?>
                        </div>
                    </div>
                <?php 
                }
            ?>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Payments</div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>