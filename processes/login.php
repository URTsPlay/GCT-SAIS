<link href="../assets/css/sweetalert2.min.css" rel="stylesheet">
<?php
	// login process
	include("../includes/connect.php");
	session_start();
	if (isset($_POST['login'])) {
		$get_login=retrieve("SELECT * FROM students WHERE schoolid=? AND password=?",array($_POST['schoolid'],$_POST['password']));

		if (COUNT($get_login) > 0) {
			$_SESSION['schoolid']=$get_login[0]['id'];
		header("location: ../dashboard.php");
		} else {
			echo "<script type='module'>
			Swal.fire('Error','Username and password does not match','error');
			window.location.href='../index.php';
		</script>";
		}
	}
?>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>