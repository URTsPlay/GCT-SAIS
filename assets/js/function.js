$(document).ready(function(){
	$("#tblStudents").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
		"order": [],
	});

	$(".edit_student").click(function(){
		$("#edit_student_id").val($(this).attr("edit_student_id"));
		$("#edit_schoolid").val($(this).attr("edit_schoolid"));
		$("#edit_student_lastname").val($(this).attr("edit_student_lastname"));
		$("#edit_student_middlename").val($(this).attr("edit_student_middlename"));
		$("#edit_student_firstname").val($(this).attr("edit_student_firstname"));
		$("#edit_student_modal").modal("show");
	});
});