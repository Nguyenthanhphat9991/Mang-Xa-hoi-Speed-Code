<!DOCTYPE html>
<?php
session_start();
include("../model/m_ketnoidb.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
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
                <h3 style="text-align: center;"><strong>Thay đổi mật khẩu.</strong></h3><hr>
                </div>
                <div class="l_pass">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id= "matkhau" type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu mới..." required >
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id= "matkhau" type="password" class="form-control" name="matkhau1" placeholder="Nhập lại mật khẩu ..." required >
                            </div><br>
                            <center><button id="nutdoimk" class="btn btn-info btn-lg" name="nutdoimk">Đổi mật khẩu</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php 
    if(isset($_POST['nutdoimk'])){

        $user = $_SESSION['user_email'];
        $get_user= "select * from user_1 where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);
        $user_id = $row['user_id'];


        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['matkhau']));
        $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['matkhau1']));
        if($pass == $pass1) {
            if(strlen($pass) >= 6 && strlen($pass) <= 16) {
                $update = "update user_1 set user_pass='$pass' where user_id='$user_id'";
                $run = mysqli_query($con, $update);
                echo"<script>alert('Mật khẩu của bạn đã được thay đổi')</script>";
                echo "<script>window.open('./v_dangnhap.php', '_self')</script>";
            }
            else{
                echo"<script>alert('Mật khẩu quá ngắn, mật khẩu từ 6 đến 16 kí tự')</script>";
            }
        }   

        else{
                echo"<script>alert('Mật khẩu không trùng khớp!!!')</script>";
                echo "<script>window.open('doimatkhau.php', '_self')</script>";
            }
        }
        

?>