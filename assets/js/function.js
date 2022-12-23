$(document).ready(function(){
    // $('.mdb-select').materialSelect();
	
    $('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover();
	$(".button-collapse").sideNav();


    $("#edit_student_isscholar").change(function(){
        if ($("#edit_student_isscholar").val() == 1) {
            $(".d-none").removeClass();
        } else {
            $(".d-none").addClass();
        }
    });

    
	
    // var or_number = Math.floor(100000 + Math.random() * 900000);
    // $("#or_number").val(or_number);

	$(".edit_student").click(function(){
        $("#edit_student_id").val($(this).attr("edit_student_id"));
        $("#edit_student_isscholar").val($(this).attr("edit_student_isscholar"));
        $("#edit_student_modal").modal("show");
    });

    $(".show_student_password").click(function(){
        $("#show_pass_id").val($(this).attr("show_pass_id"));
        $("#show_password").val($(this).attr("show_password"));
        $("#show_password_modal").modal("show");
    });

    

    $(".edit_subjects").click(function(){
		$("#edit_subjects_id").val($(this).attr("edit_subjects_id"));
		$("#edit_subjects_sub_name").val($(this).attr("edit_subjects_sub_name"));
		$("#edit_subjects_sub_units").val($(this).attr("edit_subjects_sub_units"));
		$("#edit_subjects_sub_lec_hours").val($(this).attr("edit_subjects_sub_lec_hours"));
		$("#edit_subjects_sub_lab_hours").val($(this).attr("edit_subjects_sub_lab_hours"));
		$("#edit_subjects_modal").modal("show");
	});

	
	$("#tblSubjects").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [],
	});
	

    $("#tblexamination").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
	});

    
});