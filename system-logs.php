<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS - System Logs"; ?>
<div class="row mx-auto mt-3">
    <h1 class="mr-auto ml-auto">System Logs</h1>
	<div class="col-md-12 mt-2">
		<div class="row">
            <div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						View System Logs
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm w-100 text-center" cellspacing="0" cellpadding="0" id="tblSystemLogs">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","No,User,Type,Page,Action,Details,Date");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $system_logs = retrieve("SELECT * FROM system_logs",array());
                                            for ($i=0; $i < count($system_logs); $i++) { 
                                            echo "<tr>
                                                    <td>".$system_logs[$i]['id']."</td>
                                                    <td>".$system_logs[$i]['user_id']."</td>
                                                    <td>".$system_logs[$i]['type']."</td>
                                                    <td>".$system_logs[$i]['page']."</td>
                                                    <td>".$system_logs[$i]['action']."</td>
                                                    <td>".$system_logs[$i]['details']."</td>
                                                    <td>".date("F d, Y - h:i:s a",strtotime($system_logs[$i]['date']))."</td>
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
<div class="text-center bg-primary p-4 mt-2 white-text" style="background-color: rgba(0, 0, 0, 0.05);">
    Copyright &copy; 2022
    <a class="text-reset fw-bold" href="https://www.gct.edu.ph/" target="_blank">GCT Assessor's Office</a>
</div>
<?php include('includes/modal.php') ?>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $("#tblSystemLogs").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
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