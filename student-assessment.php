<?php include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS - Tuition Fees and Assessment"; ?>
<div class="container mt-3">
    <h5 class="h5 text-uppercase">TUITION AND FEES ASSESSMENT</h5>
    <span>Show tuition and fees assessment on School Terms selected below.</span>
    <hr>
    <div class="row pa-7">
        <div class="col-md-6">
            <h6 style="font-size:20px;" class="font-weight-bold h6">Name: <?php echo $student_lastname.", ".$student_firstname." ".$student_middlename; ?></h6>
            <h6 style="font-size:20px;" class="font-weight-bold h6 text-caption">Course/Year: <?php echo $course." - ".$year; ?></h6>
        </div>
        <div class="col-md-6">
            <h6 style="font-size:20px;" class="font-weight-bold h6 text-caption">SY: <?php echo date("Y")."-".date("Y",strtotime("+1 Years")); ?></h6>
        </div>
        <div class="col-md-12">
            <div class="card blue darken-4 white-text">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                $get_student_assessment=retrieve("SELECT
                                assessment.student_id AS student_id,
                                assessment.id AS assessment_id, 
                                assessment.or_number AS or_number,
                                assessment.school_id AS school_id,
                                CONCAT_WS(' ', students.firstname, students.lastname) fullname, assessment.reg_gen_fee AS reg_gen_fee,
                                assessment.nstp_fee AS nstp_fee, assessment.lab_fee AS lab_fee,
                                assessment.tuition_fee AS tuition_fee,
                                assessment.school_year AS school_year,
                                assessment.particular AS particular,
                                assessment.subtotal AS subtotal,
                                assessment.total AS total FROM assessment 
                                INNER JOIN students ON students.id=assessment.student_id 
                                WHERE assessment.school_id=?",
                                array($student_schoolid));

                                $disp_assessment=array("Past Accounts"=>"",
                                "Registration/Gen Fee"=>$get_student_assessment[0]['reg_gen_fee'],
                                "Laboratory Fee"=>$get_student_assessment[0]['lab_fee'],
                                "NSTP Fee"=>$get_student_assessment[0]['nstp_fee'],
                                "Sub-total"=>$get_student_assessment[0]['subtotal'],
                                "Tuition"=>$get_student_assessment[0]['tuition_fee'],
                            );
                                foreach ($disp_assessment as $disp_assess_key => $disp_assess_value) {
                                    echo "<h6>".$disp_assess_key.": <span class='font-weight-bold'>".$disp_assess_value."</span></h6>";
                                }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover white-text">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Lec Hours</th>
                                        <th>Lab Hours</th>
                                        <th>Units</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $disp_subject=retrieve("SELECT
                                        assessment_subject.subjects_list AS subjects_list,
                                        subjects.subject_code AS subject_code,
                                        subjects.lec_hours AS lec_hours,
                                        subjects.lab_hours AS lab_hours,
                                        subjects.units AS units,
                                        assessment.student_id AS student_id
                                    FROM
                                        assessment_subject
                                    INNER JOIN subjects ON assessment_subject.subjects_list = subjects.id
                                    INNER JOIN students ON assessment_subject.student_id = students.id
                                    INNER JOIN assessment ON assessment_subject.student_id = assessment.student_id
                                    WHERE
                                        students.id=?",array($student_id));

                                        for ($i=0; $i < COUNT($disp_subject); $i++) { 
                                            echo "<tr>
                                                <td>".$disp_subject[$i]['subject_code']."</td>
                                                <td>".$disp_subject[$i]['lec_hours']."</td>
                                                <td>".$disp_subject[$i]['lab_hours']."</td>
                                                <td>".$disp_subject[$i]['units']."</td>
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
        <div class="col-md-12 mt-2">
            <div class="card blue darken-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover white-text">
                                <thead>
                                    <tr>
                                        <th>Payments</th>
                                        <th>OR Number</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $get_payments=retrieve("SELECT 
                                            assessment.school_id AS school_id,
                                            assessment.or_number AS or_number,
                                            payments.amount_paid AS amount_paid,
                                            payments.date_paid AS date_paid
                                            FROM payments
                                            INNER JOIN assessment ON payments.assessment_id=assessment.id
                                            WHERE assessment.school_id=?
                                        ",array($student_schoolid));

                                        for ($i=0; $i < COUNT($get_payments); $i++) { 
                                            echo "<tr>
                                                <td>".getOrdinal($i+1)." Installment</td>
                                                <td>".$get_payments[$i]['or_number']."</td>
                                                <td>".$get_payments[$i]['amount_paid']."</td>
                                                <td>".$get_payments[$i]['date_paid']."</td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover white-text">
                                <thead>
                                    <tr>
                                        <th>Exam</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $get_exam_amount=retrieve("SELECT 
                                            assessment.school_id AS school_id,
                                            assessment.or_number AS or_number,
                                            assessment.tuition_fee AS tuition_fee,
                                            payments.amount_paid AS amount_paid,
                                            payments.balance AS balance,
                                            payments.date_paid AS date_paid
                                            FROM payments
                                            INNER JOIN assessment ON payments.assessment_id=assessment.id
                                            WHERE assessment.school_id=?
                                        ",array($student_schoolid));
                                        for ($i=0; $i < COUNT($get_exam_amount); $i++) { 
                                            $prelim_exam=$get_exam_amount[$i]['tuition_fee'] / 4 + $get_exam_amount[$i]['balance'];
                                            $midterm=$get_exam_amount[$i]['tuition_fee'] / 4;
                                            $pre_final=$get_exam_amount[$i]['tuition_fee'] / 4;
                                            $final=$get_exam_amount[$i]['tuition_fee'] / 4;
                                            $get_exam_content=array("Prelim"=>$prelim_exam,"Midterm"=>$midterm,
                                                "Pre-Final"=>$pre_final,"Final"=>$final);
                                            foreach ($get_exam_content as $get_exam_key => $get_exam_value) {
                                                echo "<tr>
                                                    <td>".$get_exam_key."</td>
                                                    <td>".$get_exam_value."</td>
                                                </tr>";
                                            }
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
<div class="text-center bg-primary p-4 mt-5 fixe-bottom white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a><br>
    <span>Developed by Project69</span>
</div
<?php include('includes/footer.php'); ?>