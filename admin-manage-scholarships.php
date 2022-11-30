<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
if (isset($_POST['add_scholarship'])) {
    manage("INSERT INTO scholarship(scholarship_name, scholarship_amount,created_at) VALUES(?,?,?)",
    array($_POST['scholarship_name'],$_POST['scholarship_amount'],date("Y-m-d h:i:s A")));
    
    manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
				array($admin_username,"Admin","Scholarship","Create Scholarship",
					"<details>
						<p>Created Scholarship</p>
                        <p>
                            Scholarship Name: ".$_POST['scholarship_name']."<br>
                            Scholarship Amount: ".$_POST['scholarship_amount'].
                        "</p>
					</details>",date("Y-m-d h:i:s a")));
    echo "<script type='module'>
			Swal.fire('Success','Added Scholaship Type Successfully','success');
		</script>";
}
?>
<div class="row mx-auto mt-3">
    <h1 class="mr-auto ml-auto">Manage Scholarship</h1>
	<div class="col-md-12 mt-2">
		<div class="row">
            <div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Add Scholarship
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-graduation-cap prefix"></i>
                                                <input class="form-control" type="text" name="scholarship_name" id="scholarship_name">
                                                <label for="scholarship_name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <i class="fas fa-money-bill prefix"></i>
                                                <input class="form-control" type="text" name="scholarship_amount" id="scholarship_amount">
                                                <label for="scholarship_amount">Amount</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-md" name="add_scholarship">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-md-8 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Scholarships
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblScholarships">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,Name,Amount,Action");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_scholarship = retrieve("SELECT * FROM scholarship",array());
                                            for ($i=0; $i < count($disp_scholarship); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_scholarship[$i]['id']."</td>
                                                    <td>".$disp_scholarship[$i]['scholarship_name']."</td>
                                                    <td>".$disp_scholarship[$i]['scholarship_amount']."</td>
                                                    <td>
                                                        <span class='m-1 edit_scholarship' 
                                                                edit_scholarship_id='".$disp_scholarship[$i]['id']."' 
                                                                edit_scholarship_name='".$disp_scholarship[$i]['scholarship_name']."'
                                                                edit_scholarship_amount='".$disp_scholarship[$i]['scholarship_amount']."'
                                                                data-toggle='modal' data-target='#edit_scholarship_modal'>
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
    $("#tblScholarships").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
	});

    $(".edit_scholarship").click(function(){
		$("#edit_scholarship_id").val($(this).attr("edit_scholarship_id"));
        $("#edit_scholarship_name").val($(this).attr("edit_scholarship_name"));
		$("#edit_scholarship_amount").val($(this).attr("edit_scholarship_amount"));
		$("#edit_scholarship_modal").modal("show");
	});
})
</script>