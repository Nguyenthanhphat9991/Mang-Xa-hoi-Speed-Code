<!DOCTYPE html>
<html>

<head>
    <title>Quên mật khẩu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body{
            overflow-x: hidden;
        }
        .main-content{
            width: 50%;
            height: 40%;
            margin: 10px auto;
            background-color: #fff;
            border: 2px solid #e6e6e6;
            padding: 40px 50px;
        }
        .header{
            border: 0px solid #000;
            margin-bottom: 5px;
        }
        .well{
            background-color: #187FAB;
        }
        #nuttraloi{
            width: 60%;
            border-radius: 30px;
        }
</style>

</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color: white;"><strong>Speed Code</strong></h1></center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                <h3 style="text-align: center;"><strong>Quên mật khẩu.</strong></h3><hr>
                </div>
                <div class="l_pass">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id= "email" type="email" class="form-control" name="email" placeholder="Nhập email của bạn..." required >
                            </div><br>
                            <hr>
                            <pre class="text">Thú cưng bạn đã từng nuôi?</pre>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input id="msg" type="text" class="form-control" placeholder="Điền câu trả lời của bạn vào đây..." name="cautraloi" required>
                            </div><br>
                            <a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip"
                            title="đăng nhập" href="./v_dangnhap.php">Quay lại trang đăng nhập</a><br><br>
                            <center><button id="nuttraloi" class="btn btn-info btn-lg" name="nuttraloi">Gửi</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
session_start();
include("../model/m_ketnoidb.php"); 

	if (isset($_POST['nuttraloi'])) {

		$email = $con -> real_escape_string($_POST['email']);
		$recovery_account = $con -> real_escape_string($_POST['cautraloi']);

		$select_user = "select * from user_1 where user_email='$email' AND recovery_account='$recovery_account'";
		$query= mysqli_query($con, $select_user);

		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('../view/doimatkhau.php', '_self')</script>";
		}else{
			echo"<script>alert('Email hoặc câu trả lời chưa chính xác')</script>";
		}
	}
?>