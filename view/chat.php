<!DOCTYPE html>
<?php
session_start();
include("./v_header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>

<head>
    <title>Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/styles/style_home.css">

    <style>
    #lantinnhan {
        max-height: 500px;
        overflow: scroll;
    }

    #btn-gui {
        width: 20%;
        height: 28px;
        border-radius: 5px;
        margin: 5px;
        border: none;
        color: #fff;
        float: right;
        background-color: #2ecc71;
    }

    #select_user {
        max-height: 500px;
        overflow: scroll;
    }

    #green {
        background-color: #2ecc71;
        border-color: #27ae60;
        width: 45%;
        padding: 2.5px;
        font-size: 16px;
        border-radius: 3px;
        float: left;
        margin-bottom: 5px;
    }

    #blue {
        background-color: #3498db;
        border-color: #298069;
        width: 45%;
        padding: 2.5px;
        font-size: 16px;
        border-radius: 3px;
        float: right;
        margin-bottom: 5px;
    }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if(isset($_GET['user_id'])){
                global $con;
                $get_id = $_GET['user_id'];
                $get_user = "select * from user_1 where user_id=$get_id";

                $run_user = mysqli_query($con, $get_user);
                $row_user = mysqli_fetch_array($run_user);
                //  var_dump($get_id);die;
                $user_to_msg = $row_user['user_id'];
                $user_to_name = $row_user['user_name'];


            }
            $user = $_SESSION['user_email'];
            $get_user = "select * from user_1 where user_email='$user'";

            $run_user = mysqli_query($con, $get_user);

            $row = mysqli_fetch_array($run_user);

            $user_from_msg = $row['user_id'];
            $user_from_name = $row['user_name'];
        ?>
            <div class="col-sm-3" id="select_user">
                <?php
                $user = "select * from user_1";
                $run_user = mysqli_query($con, $user);
                while($row_user = mysqli_fetch_array($run_user)){
                    $user_id = $row_user['user_id'];
                    $user_name = $row_user['user_name'];
                    $first_name = $row_user['f_name'];
                    $last_name = $row_user['l_name'];
                    $user_image = $row_user['user_image'];

                    echo"
                        <div class='container-fluid'>
                            <a style='text-decoration: none; cursor: pointer; color: #3897F0;'
                                href='./chat.php?user_id=$user_id'>
                                <img class='img-circle' src='$user_image' width='90px' height='80px' 
                                title='$user_name'> 
                                <strong>&nbsp $first_name $last_name</strong><br><br>
                            </a>
                        </div>
                    ";
                }                   
            ?>
            </div>
            <div class="col-sm-6">
                <div class="load_msg" id="lantinnhan">
                    <?php
                    $sel_msg = "select * from chat where (nguoi_gui='$user_to_msg'
                    AND nguoi_nhan='$user_from_msg') OR (nguoi_nhan='$user_to_msg' AND
                    nguoi_gui='$user_from_msg') ORDER by 1 ASC";
                    $run_msg = mysqli_query($con, $sel_msg);
                    while($row_msg = mysqli_fetch_array($run_msg)){
                        $nguoi_gui = $row_msg['nguoi_gui'];
                        $nguoi_nhan = $row_msg['nguoi_nhan'];
                        $noidunggui = $row_msg['noidunggui'];
                        $thoigian = $row_msg['thoigian'];
                ?>
                    <div id="loaded_msg">
                        <p>
                            <?php 
                                if($nguoi_gui == $user_to_msg AND $nguoi_nhan == $user_from_msg){
                                    echo "
                                    <div class='message' id='blue' data-toggle ='tooltip' 
                                    title='$thoigian'>$noidunggui</div><br><br><br>
                                    ";}
                                else if($nguoi_nhan == $user_to_msg AND $nguoi_gui == $user_from_msg){
                                    echo" 
                                    <div class='message' id='green' data-toggle='tooltip' 
                                    title='$thoigian'>$noidunggui</div><br><br><br> 
                                    ";}
                            ?>
                        </p>
                    </div>

                    <?php
                    }
                ?>
                </div>
                <?php
                if(isset($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                    if($user_id == "new"){
                    echo'
                        <form>
                            <center><h3>Mess</h3></center>
                        <textarea disabled class="form-control" placeholder="Soạn tin nhắn"></textarea>
                        <input type="submit" class="btn btn-default" disabled value="Gửi">
                        </form><br><br>
                    ';
                    }
                    else{
                        echo'
                            <form action="" method="POST">
                            <textarea class="form-control" placeholder="Soạn tin nhắn"
                            name="noidung" id="message_textarea"></textarea>
                            <input type="submit" name="gui" id="btn-gui" value="Gửi">
                            </form><br><br>
                        ';
                    }
                }
            ?>
                <?php 
                if(isset($_POST['gui'])){
                    $noidung = htmlentities($_POST['noidung']);
                    if($noidung == ""){
                        echo"
                            <h4 style='color:red;text-align: center;'>
                                nội dung tin nhắn không được để trống!
                            </h4>
                        ";
                    }else if(strlen($noidung) > 255){
                        echo"
                            <h4 style='color:red;text-align: center;'>
                                Tin nhắn quá dài
                            </h4>";
                    }else{
                        $insert = "
                                    insert into chat
                                    (nguoi_gui, nguoi_nhan, noidunggui, thoigian,noidungxem) values ('$user_to_msg',
                                    '$user_from_msg', '$noidung', NOW(), 'no')
                                ";
                        $run_insert = mysqli_query($con, $insert);
                        } 
                }
            ?>
            </div>
            <div class="col-sm-3">
                <?php
            if(isset($_GET['user_id'])){
                global $con;
                $get_id = $_GET['user_id'];
                $get_user = "select * from user_1 where user_id='$get_id'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $f_name = $row['f_name'];
                $l_name = $row['l_name'];
                $describe_user = $row['describe_user'];
                $user_country = $row['user_country'];
                $user_image = $row['user_image'];
                $user_reg_date = $row['user_reg_date'];
                $user_gender = $row['user_gender'];
            }
                if($get_id == "new") {

                }else{
                    echo"
                        <div class='row'>
                            <div class='col-sm-2'>
                            </div>
                            <center>
                                <div style='background-color: #e6e6e6;' class='col-sm-9'>
                                    <h2>Information About</h2>
                                    <img class='img-circle' src='$user_image' width='150'
                                    height='150'>
                                    <br><br>
                                    <ul class='list-group'>
                                        <li class='list-group-item' title='Username'><strong>
                                        $f_name $l_name</strong></li>
                                        <li class='list-group-item' title='User status'><strong
                                        style='color: grey;'>$describe_user</strong></li>
                                        <li class='list-group-item' title='Gender'>$user_gender</li>
                                        <li class='list-group-item' title='Country'>
                                        $user_country</li>
                                        <li class='list-group-item' title='User Registration
                                        Date'>$user_reg_date</li>
                                    </ul>
                                </div>

                            </center>
                        </div>
                    ";    
                }
            ?>
            </div>
        </div>
    </div>

    <script>
        var div = document.getElementById("lantinnhan");
        div.scrollTop = div.scrollHeight;
    </script>
</body>

</html>