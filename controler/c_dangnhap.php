<?php
session_start();
include("../model/m_ketnoidb.php"); 

	if (isset($_POST['login'])) {

		$email = $con -> real_escape_string($_POST['email']);
		$pass = $con -> real_escape_string($_POST['pass']);

		$select_user = "select * from user_1 where user_email='$email' AND user_pass='$pass' AND status='hoatdong'";
		$query= mysqli_query($con, $select_user);

		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('../view/home.php', '_self')</script>";
		}else{
			echo"<script>alert('tài khoản hoặc mật khẩu không chính xác')</script>";
		}
	}
?>