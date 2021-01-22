<?php
include("../model/m_ketnoidb.php");


function insertPost()
{
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;

        $url_posts = '../assets/imagespost';

		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250){
			echo "<script>alert('Nội dung quá dài!!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "$url_posts/$random_number.$upload_image");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$random_number.$upload_image', NOW())";
				
				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Bài viết đã được cập nhật!!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update user_1 set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "$url_posts/$random_number.$upload_image");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$random_number.$upload_image',NOW())";
						
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Bài viết đã được cập nhật!!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update user_1 set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Bài viết đã được cập nhật!!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update user_1 set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}

function get_posts()
{
	global $con;
    $per_page = 4;
    $url_getimageposts = '../assets/imagespost';
    
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from user_1 where user_id='$user_id' ";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];


		if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-6'>
							<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='../view/v_xem_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Bình luận</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-6'>
							<p>$content</p> 
							<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='../view/v_xem_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Bình luận</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-6'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='../view/v_xem_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Bình luận</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}
	include("phantrang.php");
}

function trang_post()
{
		$url_getimageposts = '../assets/imagespost';
		if (isset($_GET['post_id'])) {
		global $con;
		$get_id = $_GET['post_id'];
		$get_posts = "select * from posts where post_id='$get_id'";
		$run_posts = mysqli_query($con, $get_posts);
		$row_posts = mysqli_fetch_array($run_posts);
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts ['post_date'];
		$user = "select * from user_1 where user_id=' $user_id' AND posts='yes'" ;

		$run_user = mysqli_query($con, $user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		$user_com = $_SESSION['user_email'];

		$get_com = "select * from user_1 where user_email='$user_com'";

		$run_com = mysqli_query($con, $get_com);
		$row_com = mysqli_fetch_array($run_com);

		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];

		if(isset($_GET['post_id']))
		{
			$post_id = $_GET['post_id'];
		}
			$get_posts = "select post_id from user_1 where post_id='$post_id'";
			$run_user = mysqli_query($con, $get_posts);
			$post_id = $_GET['post_id'];

			$post = $_GET['post_id'];
			$get_user = "select * from posts where post_id='$post'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);


			$p_id = $row['post_id'];
			if($p_id != $post_id) 
			{
				echo "<script>alert('Lỗi')</script>";
				echo "<script>window.open('../view/home.php', '_self')</script>";
			}
			else
			{
				if($content=="No" && strlen($upload_image) >= 1){
					echo"
					<div class='row'>
						<div class='col-sm-3'>
						</div>
						<div id='posts' class='col-sm-6'>
							<div class='row'>
								<div class='col-sm-2'>
								<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div><br>
						</div>
						<div class='col-sm-3'>
						</div>
					</div><br><br>
					";
				}
		
				else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
					echo"
					<div class='row'>
						<div class='col-sm-3'>
						</div>
						<div id='posts' class='col-sm-6'>
							<div class='row'>
								<div class='col-sm-2'>
								<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<p>$content</p>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div><br>
						</div>
						<div class='col-sm-3'>
						</div>
					</div><br><br>
					";
				}
		
				else
				{
					echo"
						<div class='row'>
							<div class='col-sm-3'>
							</div>
							<div id='posts' class='col-sm-6'>
								<div class='row'>
									<div class='col-sm-2'>
									<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
									</div>
									<div class='col-sm-6'>
										<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
										<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
									</div>
									<div class='col-sm-4'>
									</div>
								</div>
								<div class='row'>
									<div class='col-sm-6'>
										<h3><p>$content</p></h3>
									</div>
								</div><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br>
						";
				}

				include("binh_luan.php");
					echo"
						<div class='row'>
							<div class='col-md-6 col-md-offset-3'>
								<div class='panel panel-info'>
									<div class='panel-body'>
										<form action='' method='post' class='form-inline'>
											<textarea placeholder='Viết bình luận tại đây' class='form-control'  id='exampleFormControlTextarea4' rows='4' style='width:100%;'
												name='binhluan'></textarea> <br>
											<button style='margin-top: 5px;' class='btn btn-info pull-right' name='reply'>Bình luận</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						";

						if(isset($_POST['reply']))
						{
							$bl = htmlentities($_POST['binhluan']);
							if($bl == "")
							{
								echo "<script>alert('Bạn chưa bình luận')</script>";
								echo "<script>window.open('../view/v_xem_post.php?post_id=$post_id', '_self')</script>
								";
							}
							else
							{
								$insert = "insert into binh_luan(post_id, user_id, binh_luan,nguoi_binh_luan, thoi_gian) 
								values('$post_id', '$user_id','$bl','$user_com_name', NOW())";
								$run = mysqli_query($con, $insert);
								echo "<script>window.open('../view/v_xem_post.php?post_id=$post_id', '_self')</script>";
								
							}
						}
				}
		}
}

function user_posts(){
	global $con;

	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		}
		$get_posts = "select * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT 5";
		$run_posts = mysqli_query($con, $get_posts);
		while($row_posts=mysqli_fetch_array($run_posts)){
			$url_getimageposts = '../assets/imagespost';
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$post_content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts ['post_date'];

			$user = "select * from user_1 where user_id='$user_id' AND posts='yes' ";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			if(isset($_GET['user_id'])){
				$user_id = $_GET['user_id'];
			}
			$getuser = "select user_email from user_1 where user_id='$user_id'";

			$run_user = mysqli_query($con, $getuser);
			$row = mysqli_fetch_array($run_user);

			$user_email = $row['user_email'];
			$user = $_SESSION['user_email'];
			$get_user = "select * from user_1 where user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$user_id = $row['user_id'];
			$u_email = $row['user_email'];
		
			if($u_email != $user_email){
				echo"<script>window.open('baivietcanhan.php?user_id=$user_id','_self')</script>";
			}else{
				if($post_content=="No" && strlen($upload_image) >= 1){
					echo"
					<div class='row'>
						<div class='col-sm-3'>
						</div>
						<div id='posts' class='col-sm-6'>
							<div class='row'>
								<div class='col-sm-2'>
								<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div><br>
						</div>
						<div class='col-sm-3'>
						</div>
					</div><br><br>
					";
				}
		
				else if(strlen($post_content) >= 1 && strlen($upload_image) >= 1){
					echo"
					<div class='row'>
						<div class='col-sm-3'>
						</div>
						<div id='posts' class='col-sm-6'>
							<div class='row'>
								<div class='col-sm-2'>
								<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
								</div>
								<div class='col-sm-6'>
									<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
									<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
								</div>
								<div class='col-sm-4'>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<p>$post_content</p>
									<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
								</div>
							</div><br>
						</div>
						<div class='col-sm-3'>
						</div>
					</div><br><br>
					";
				}
		
				else
				{
					echo"
						<div class='row'>
							<div class='col-sm-3'>
							</div>
							<div id='posts' class='col-sm-6'>
								<div class='row'>
									<div class='col-sm-2'>
									<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
									</div>
									<div class='col-sm-6'>
										<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
										<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
									</div>
									<div class='col-sm-4'>
									</div>
								</div>
								<div class='row'>
									<div class='col-sm-6'>
										<h3><p>$post_content</p></h3>
									</div>
								</div><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br>
						";
				}
			}
		}
}

function timkiembaiviet(){
	global $con;
	if(isset($_GET['nuttimkiem'])){
		$keysearch = htmlentities($_GET['keysearch']);
	}
	$get_posts = "select * from posts where post_content like '%$keysearch%' OR upload_image like '%$keysearch%'";
	// var_dump($get_posts);die;
	$run_posts = mysqli_query($con, $get_posts);
	while($row_posts=mysqli_fetch_array($run_posts)){
		$url_getimageposts = '../assets/imagespost';
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_content = $row_posts ['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from user_1 where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con, $user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$first_name = $row_user['l_name'];
		$user_image = $row_user['user_image'];
		if($post_content=="No" && strlen($upload_image) >= 1){
			echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
			";
		}

		else if(strlen($post_content) >= 1 && strlen($upload_image) >= 1){
			echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<p>$post_content</p>
								<img id='posts-img' src='$url_getimageposts/$upload_image' style='height:350px;'>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
			";
		}

		else {
			echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='v_profile.php?user_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>lúc <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<h3><p>$post_content</p></h3>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
			";
		}
	
	}
}

function timkiemuser()
{
	global $con;
	if (isset($_GET['search_user_btn'])) 
	{
		$search_query = htmlentities($_GET['search_user']);
		$sql  = "select * from user_1 where f_name like '%$search_query%' OR
		l_name like '%$search_query%' OR user_name like '%$search_query%'";
	}
	else
	{
		$sql = "select * from user_1";
	}

	$result  = mysqli_query($con,$sql);
	while ($r = mysqli_fetch_array($result)) 
	{
		$user_id = $r['user_id'];
		$f_name = $r['f_name'];
		$l_name = $r['l_name'];
		$username = $r['user_name'];
		$user_image = $r['user_image'];

		echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people' 
					style='border: 5px solid #e6e6e6; padding: 40px 50px;' >
						<div class='col-sm-4'>
							<a href='user_profile.php?user_id=$user_id'>
								<img src='$user_image' width='150px' height='140px' title='$username' style='float:left; margin:1px;'/>
							</a>
						</div><br><br>
						<div class='col-sm--6'>
							<a style='text-decoration:none; cursor: pointer;color:#3897fo; 'href='user_profile.php?user_id=$user_id'>
								<strong><h2>$f_name $l_name</h2></strong>
							</a>
						</div>
						<div class='col-sm-3'>
						</div>
					</div>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br> ";
	}
}
	
?>