<?php
session_start();

$get_students=retrieve("SELECT * FROM students WHERE id=?",array($_SESSION['schoolid']));
$name=$get_students[0]['firstname']." ".$get_students[0]['lastname'];
$fullname = $get_students[0]['firstname']." ".$get_students[0]['middlename']." ".$get_students[0]['lastname'];
$course=$get_students[0]['course'];
$year=$get_students[0]['year'];

if (!isset($_SESSION['schoolid'])) {
	header("location: index.php");
}
?>