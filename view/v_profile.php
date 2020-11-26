<!DOCTYPE html>
<?php
session_start();
include("./v_header.php");

if (!isset($_SESSION['user_email'])) {
	header("location: index.php");
}
?>
<html>

<head>
    <?php
	$user = $_SESSION['user_email'];
	$get_user = "select * from user_1 where user_email='$user'";
	$run_user = mysqli_query($con, $get_user);
	$row = mysqli_fetch_array($run_user);

	$user_name = $row['user_name'];
	?>
    <title><?php echo "$user_name"; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/styles/style_profile.css">
</head>
<style>
#cover-img {
    height: 400px;
    width: 100%;
}

#profile-img {
    position: absolute;
    top: 160px;
    left: 40px;
}

#update_profile {
    position: relative;
    top: -33px;
    cursor: pointer;
    left: 93px;
    border-radius: 4px;
    background-color: rgba(0, 0, 0, 0.1);
    transform: translate(-50%, -50%);
}

#button_profile {
    position: absolute;
    top: 82%;
    left: 50%;
    cursor: pointer;
    transform: translate(-50%, -50%);
}

#own_posts {
    border: 5px solid #e6e6e6;
    padding: 40px 50px
}
</style>

<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <?php
			echo "
			<div>
				<div><img id='cover-img' class='img-rounded' src='$user_cover' alt='cover' ></div>
				<form action='v_profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
						<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button>
						<div class='dropdown-menu'>
							<center>
							<p>Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
							<label class='btn btn-info'> Select Cover
							<input type='file' name='u_cover' size='60' />
							</label><br><br>
							<button name='submit' class='btn btn-info'>Update Cover</button>
							</center>
						</div>
					</li>
				</ul>
				</form>
            </div>
            
            <div id='profile-img'>
            <img src='$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
            <form action='v_profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>

            <label id='update_profile'> Select Profile
            <input type='file' name='u_image' size='60' />
            </label><br><br>
            <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
            </form>
        </div><br>
			";
			?>
            <?php

			if (isset($_POST['submit'])) {

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1, 100);

				$url_cover = "../assets/imagecover/$random_number.$u_cover";

				if ($u_cover == '') {
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('v_profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				} else {
					move_uploaded_file($image_tmp, $url_cover);
					$update = "update user_1 set user_cover='$url_cover' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if ($run) {
						echo "<script>alert('Your Cover Updated')</script>";
						echo "<script>window.open('v_profile.php?u_id=$user_id' , '_self')</script>";
					}
				}
			}

			?>
        </div>

        <?php
		if (isset($_POST['update'])) {

			$u_image = $_FILES['u_image']['name'];
			$image_tmp = $_FILES['u_image']['tmp_name'];
			$random_number = rand(1, 100);

			$url_image = "../assets/imageava/$random_number.$u_image";

			if ($u_image == '') {
				echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
				echo "<script>window.open('v_profile.php?u_id=$user_id' , '_self')</script>";
				exit();
			} else {
				move_uploaded_file($image_tmp, $url_image);
				$update = "update user_1 set user_image='$url_image' where user_id='$user_id'";

				$run = mysqli_query($con, $update);

				if ($run) {
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('v_profile.php?u_id=$user_id' , '_self')</script>";
				}
			}
		}
		?>
        <div class="col-sm-1">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2" style="background-color: #e6e6e6;text-align: left;left: 0.6%;border-radius: 5px; ">
            <?php
			echo "
			<center><h2><strong>Thông Tin Cá Nhân</strong></h2></center>
			<center><h4><strong>$first_name $last_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
			<p><strong>Mối Quan Hệ: </strong> $Relationship_status</p><br>
			<p><strong>Quốc Gia: </strong> $user_country</p><br>
			<p><strong>Ngày Tham Gia: </strong> $register_date</p><br>
			<p><strong>Giới Tính: </strong> $user_gender</p><br>
			<p><strong>Ngày Sinh: </strong> $user_birthday</p><br>
		";
			?>
        </div>

        <div class="col-sm-6">
            <?php 
				global $con;
				if (isset($_GET['u_id'])) {
					$u_id = ($_GET['u_id']);
				}

				$get_posts = "
				select * from posts 
				where user_id = '$u_id'
				order by 1 desc limit 5";

				$run_posts = mysqli_query($con, $get_posts);
				while ($row_posts = mysqli_fetch_array($run_posts)){
					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$content = $row_posts['post_content'];
					$upload_image = $row_posts['upload_image'];
					$post_date = $row_posts['post_date'];

				$user = "select * from user_1
				where user_id = '$user_id' and posts = 'yes'" ;

				$url_getimageposts = '../assets/imagespost';

				$run_user = mysqli_query($con , $user);
				$row_user = mysqli_fetch_array($run_user);

				$user_name = $row_user['user_name'];
				$user_image = $row_user['user_image'];

					if($content == "No" && strlen($upload_image) >=1){
						echo "
						<div id = 'own_posts'>
							<div class='row'>
								<div class='col-sm-2'>
									<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-12'>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div>
								<br>
							<a href='single.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-success'>Xem</button>
							</a>
							<a href='../model/xoa_posts.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-danger'>Xóa</button>
							</a>
						</div><br><br>
						";
					}

					else if(strlen($content) >= 1 && strlen($upload_image) >=1){
						echo "
						<div id = 'own_posts'>
							<div class='row'>
								<div class='col-sm-2'>
									<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3>
										<p>$content</p>
									</h3>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div>
								<br>
							<a href='single.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-success'>Xem</button>
							</a>
							<a href='../model/xoa_posts.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-danger'>Xóa</button>
							</a>
						</div><br><br>
						";
					}

					else {
						echo "
						<div id = 'own_posts'>
							<div class='row'>
								<div class='col-sm-2'>
									<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-2'>
								</div>
								<div class='col-sm-6'>
									<h3>
										<p>$content</p>
									</h3>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
						";

						global $con;
						if (isset($_GET['u_id'])) {
							$u_id = ($_GET['u_id']);
						}

						$get_postsemail = "
						select user_email from user_1 
						where user_id = '$u_id'";

						$run_user = mysqli_query($con, $get_postsemail);
						$row = mysqli_fetch_array($run_user);
						
						$user_email = $row['user_email'];

						$user = $_SESSION['user_email'];
						
						$get_user = "select * from user_1
						where user_email = '$user'" ;

						$run_user = mysqli_query($con,$get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$u_email = $row['user_email'];

						if($u_email != $user_email){
							echo "<script>window.open('v_profile.php?u_id=$user_id', '_self')</script>";
						}
						else{
							echo "
							 <a href='single.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-success'>Xem</button>
							</a>
							<a href='edit_post.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-info'>Sửa</button>
							</a>
							<a href='../controler/c_xoa_posts.php?post_id=$post_id' style='float:right;'>
								<button class='btn btn-danger'>Xóa</button>
							</a>
					</div><br><br><br>
						";
						}
					}
				}
			?>
        </div>
    </div>
</body>

</html>

