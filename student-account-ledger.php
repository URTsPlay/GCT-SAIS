<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS - Student Ledger"; ?>
<div class="container mt-3">
    <h4 class="h4 text-uppercase pb-5; text-center">Account Ledger</h4>
    <div class="row pa-7 white-text blue darken-4">
        <div class="col-md-6">
            <h6></h6>
            <h6 style="font-size:30px;" class="font-weight-bold h6"><?php echo $student_fullname; ?></h6>
            <span>Student ID No. <?php echo $student_schoolid; ?></span>
        </div>
        <div class="col-md-6">
            <h6></h6>
            <h6 style="font-size:29px;" class="font-weight-bold h6 text-caption"><?php echo $course." - ".$year; ?></h6>
            <span>COURSE AND YEAR</span>
        </div>
    </div>
    <table class="table table-striped table-hover table-sm mt-5 ml-0 mr-0 mb-10 d-none">
        <thead></thead>
        <tbody>
            <tr>
                <td>Student Account Name</td>
                <td class="font-weight-bold"><?php echo $student_fullname; ?></td>
            </tr>
            <tr>
                <td>Student ID no.</td>
                <td class="font-weight-bold"><?php echo $student_schoolid; ?></td>
            </tr>
            <tr>
                <td>Coure and Year</td>
                <td class="font-weight-bold"><?php echo $course." - ".$year; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td class="font-weight-bold">
                    <?php echo ($student_status==1 ? "<span class='text-success'>Active</span>" : 
                        "<span class='text-danger'>Inactive</span>"); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <h4 class="font-weight-bold pb-8 mt-5">ACCOUNT TRANSACTION DETAILS</h4>
            <table class="table table-striped table-hover table-sm w-100">
                <thead>
                    <tr>
                        <?php
                            $sem_grade_header=explode(",","Date,Particular,Receipt Number,Debit,Credit,Balance");
                            foreach ($sem_grade_header as $header) {
                                echo "<th>".$header."</th>";
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_stud_ledger=retrieve("SELECT payments.id as payment_id,
                        assessment.or_number AS or_number,
                        CONCAT_WS(' ', students.firstname, students.lastname) stud_name,
                        assessment.total AS total,
                        assessment.particular AS particular,
                        payments.amount_paid AS amount_paid,
                        payments.balance AS balance,
                        payments.date_paid AS date_paid
                        FROM payments 
                        INNER JOIN assessment ON assessment.id=payments.assessment_id 
                        INNER JOIN students ON students.id=assessment.student_id WHERE students.schoolid=?",array($student_schoolid));

                        for ($i=0; $i < COUNT($get_stud_ledger); $i++) { 
                            echo "<tr>
                                <td>".$get_stud_ledger[$i]['date_paid']."</td>
                                <td>".($get_stud_ledger[$i]['particular']==1 ? "1st SEM" : "2nd SEM")."</td>
                                <td>".$get_stud_ledger[$i]['or_number']."</td>
                                <td>".$get_stud_ledger[$i]['total']."</td>
                                <td>".$get_stud_ledger[$i]['amount_paid']."</td>
                                <td>".$get_stud_ledger[$i]['balance']."</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center bg-primary p-4 d-none white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a><br>
    <span>Developed by Project69</span>
</div>
<?php include('includes/footer.php'); ?>