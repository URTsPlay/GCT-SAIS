<?php
session_start();

$get_login_student=retrieve("SELECT * FROM login_credentials 
		LEFT JOIN students ON login_credentials.user_id=students.id
		WHERE login_credentials.id=?",array($_SESSION['user_id']));

$get_login_admin=retrieve("SELECT * FROM login_credentials 
		LEFT JOIN admin ON login_credentials.user_id=admin.id
		WHERE login_credentials.id=?",array($_SESSION['user_id']));

//student variables
$student_schoolid = $get_login_student[0]['schoolid'];
$student_name=$get_login_student[0]['firstname']." ".$get_login_student[0]['lastname'];
$student_fullname = $get_login_student[0]['firstname']." ".$get_login_student[0]['middlename']." ".$get_login_student[0]['lastname'];
$student_email=$get_login_student[0]['email'];
$student_contact_number=$get_login_student[0]['contact_number'];
$course=$get_login_student[0]['course'];
$year=$get_login_student[0]['year'];
$student_type=$get_login_student[0]['type'];
$student_username=$get_login_student[0]['username'];
$student_password=$get_login_student[0]['password'];

//admin variables
$admin_name=$get_login_admin[0]['firstname']." ".$get_login_admin[0]['lastname'];
$admin_fullname = $get_login_admin[0]['firstname']." ".$get_login_admin[0]['middlename']." ".$get_login_admin[0]['lastname'];
$admin_email=$get_login_admin[0]['email'];
$admin_contact_number=$get_login_admin[0]['contact_number'];
$admin_type=$get_login_admin[0]['type'];
$position=$get_login_admin[0]['position'];
$status=$get_login_admin[0]['status'];
$admin_username=$get_login_admin[0]['username'];
$admin_password=$get_login_student[0]['password'];

if (!isset($_SESSION['user_id'])) {
	header("location: index.php");
}
?>