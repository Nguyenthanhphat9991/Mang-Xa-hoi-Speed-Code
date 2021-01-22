<?php

include("../model/functions.php");
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">Speed Code</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
			  <?php 
			 	 include("../model/ketnoi.php");
    			$ketnoi = new Ketnoi();
			   	$row = $ketnoi->select_header();

				$user_id = $row['user_id']; 			
				$user_name = $row['user_name'];
				$first_name = $row['f_name'];
				$last_name = $row['l_name'];
				$describe_user = $row['describe_user'];
				$Relationship_status = $row['Relationship'];
				$user_pass = $row['user_pass'];
				$user_email = $row['user_email'];
				$user_country = $row['user_country'];
				$user_gender = $row['user_gender'];
				$user_birthday = $row['user_birthday'];
				$user_image = $row['user_image'];
				$user_cover = $row['user_cover'];
				$recovery_account = $row['recovery_account'];
				$register_date = $row['user_reg_date'];
					
				?>

	        <li><a href='v_profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "$first_name"; ?></a></li>
	       	<li><a href="home.php">Trang chủ</a></li>
			<li><a href="v_tim_ban_be.php">Tìm kiếm bạn bè</a></li>
			<li><a href="chat.php?<?php echo "user_id=$user_id" ?>">Chat</a></li>

					<?php
						echo"
						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
							<li>
									<a href='baivietcanhan.php?user_id=$user_id'>Bài viết của tôi</a>
								</li>
								<li>
									<a href='sua_thongtincanhan.php?user_id=$user_id'>Sửa thông tin</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='v_dang_xuat.php'>Đăng xuất</a>
								</li>
							</ul>
						</li>
						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="timkiembaiviet.php">
						<div class="form-group">
							<input type="text" class="form-control" name="keysearch" placeholder="Tìm kiếm">
						</div>
						<button type="submit" class="btn btn-info" name="nuttimkiem">Tìm kiếm</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>