<?php
include("../model/m_ketnoidb.php"); 
	if(isset($_POST['dangki'])){

		$first_name = $con -> real_escape_string($_POST['first_name']);
		$last_name = $con -> real_escape_string($_POST['last_name']);
		$pass = $con -> real_escape_string($_POST['u_pass']);
		$email = $con -> real_escape_string($_POST['u_email']);
		$country = $con -> real_escape_string($_POST['u_country']);
		$gender = $con -> real_escape_string($_POST['u_gender']);
		$birthday = $con -> real_escape_string($_POST['u_birthday']);

		$status = "hoatdong";
		$posts = "no";


		$newgid = sprintf('%05d', rand(0, 999999));
		$user_name= ($first_name. "_" .$last_name. "_" .$newgid);

		$check_username_query = "select user_name from user_1 where user_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		// if(strlen($pass) <9 ){
		// 	echo"<script>alert('Password should be minimum 9 characters!')</script>";
		// 	exit();
		// }

		$check_email = "select * from user_1 where user_email='$email'";
		$run_email = mysqli_query($con,$check_email);

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$rand = rand(1, 3);

			if($rand == 1)
				$profile_pic = "../assets/images/covit.png";
			else if($rand == 2)
				$profile_pic = "../assets/images/covit.png";
			else if($rand == 3)
				$profile_pic = "../assets/images/covit.png";

				$them = "insert into user_1 (f_name,l_name,user_name,describe_user,Relationship,user_pass,user_email
				,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)
				values('$first_name','$last_name','$user_name','Hello Coding Cafe.This is my default status!','...','$pass','$email'
				,'$country','$gender','$birthday','$profile_pic','../assets/images/banner.png',NOW(),'$status','$posts','Iwanttoputading intheuniverse.')";
		
		$query = mysqli_query($con,$them);
		
		if($query){
			echo "<script>alert('Well Done $first_name, you are good to go.')</script>";
			echo "<script>window.open('../view/home.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
	mysqli_close($con);
?>
