<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
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
                                                            echo "<option value=".$getStudents[$i]['schoolid'].">".$getStudents[$i]['lastname'].", ".$getStudents[$i]['firstname']." ".$getStudents[$i]['middlename']."</option>";
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
                                                <input class="form-control" type="text" name="lab_fee" id="middlelab_feename">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-5 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Payments
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">

                                </form>
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
    var or_number = Math.floor(100000 + Math.random() * 900000);
    $("#or_number").val(or_number);
})
</script>