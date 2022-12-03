<?php include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS - Tuition Fees and Assessment"; ?>
<div class="container mt-3">
    <h5 class="h5 text-uppercase">TUITION AND FEES ASSESSMENT</h5>
    <span>Show tuition and fees assessment on School Terms selected below.</span>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <select class="mdb-select md-form" name="school_year" id="school_year" searchable="Search here..">
                                <option value="">Select Student</option>
                                <?php
                                  $date2=date('Y', strtotime('+1 Years'));
                                  for($i=date('Y'); $i<$date2+5;$i++){
                                      echo "<option value='".$i."-".($i+1)."'>".$i."-".($i+1)."</option>";
                                  }  
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <?php
                            $sem_grade_header=explode(",","Fees,Amount");
                            foreach ($sem_grade_header as $header) {
                                echo "<th>".$header."</th>";
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>