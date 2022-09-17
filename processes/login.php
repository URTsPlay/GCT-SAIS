<link href="../assets/css/sweetalert2.min.css" rel="stylesheet">
<?php
	// login process
	date_default_timezone_set("Asia/Manila");
	include("../includes/connect.php");
	session_start();
	if (isset($_POST['login'])) {
		$get_login=retrieve("SELECT * FROM login_credentials 
				WHERE username=? AND password=?",array($_POST['username'],$_POST['password']));

		if (COUNT($get_login) > 0) {
			$_SESSION['user_id']=$get_login[0]['id'];
			if ($get_login[0]['status'] == 1) {
				if ($get_login[0]['type'] == 2) {
					header("location: ../student-dashboard.php");
				} else if ($get_login[0]['type'] == 1) {
					header("location: ../admin-dashboard.php");
				}
			} else {
				echo "<script type='module'>
						Swal.fire('Error','Your account is deactivated, please contact the administrator','error');
						window.location.href='../index.php';
					</script>";
			}
		} else {
			echo "<script type='module'>
				Swal.fire('Error','Username and password does not match','error');
				window.location.href='../index.php';
			</script>";
		}
	}
?>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
