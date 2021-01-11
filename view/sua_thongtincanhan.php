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
    <title>Sửa thông tin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/styles/style_home.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active">
                            <h2>Sửa thông tin</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Đổi tên</td>
                        <td>
                            <input class="form-control" type="text" name="ten" required 
                            value="<?php echo $first_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Đổi Họ</td>
                        <td>
                            <input class="form-control" type="text" name="ho" required 
                            value="<?php echo $last_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Đổi tên tài khoản</td>
                        <td>
                            <input class="form-control" type="text" name="tentaikhoan" required 
                            value="<?php echo $user_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Mô tả</td>
                        <td>
                            <input class="form-control" type="text" name="mota" required 
                            value=" <?php echo $describe_user; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Mối quan hệ</td>
                        <td>
                            <select class="form-control" name="moiquanhe">
                                <option><?php echo $Relationship_status ?></option>
                                <option>Đính hôn</option>
                                <option>Đã kết hôn</option>
                                <option>Độc thân</option>
                                <option>Một mối quan hệ</option>
                                <option>Phức tạp</option>
                                <option>Đã ly hôn</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;">Mật khẩu</td>
                        <td>
                            <input class="form-control" type="password" name="matkhau" id="mypass" required
                            value="<?php echo $user_pass; ?>">
                            <input type="checkbox" onclick="show_password()"><strong>Hiển thị mật khẩu</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Email</td>
                        <td>
                            <input class="form-control" type="email" name="email" required 
                            value="<?php echo $user_email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Quốc gia</td>
                        <td>
                            <select class="form-control" name="quocgia">
                                <option><?php echo $user_country; ?></option>
                                <option selected>Việt Nam</option>
                                <option>Mỹ</option>
                                <option>Anh</option>
                                <option>Nga</option>
                                <option>Nhật</option>
                                <option>Thái Lan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Giới tính</td>
                        <td>
                            <select class="form-control" name="gioitinh">
                                <option><?php echo $user_gender; ?></option>
                                <option>Nam</option>
                                <option>Nữ</option>
                                <option>Khác</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Ngày sinh</td>
                        <td>
                            <input class="form-control input-md" type="date" name="ngaysinh" required
                            value="<?php echo $user_birthday; ?>">
                        </td>
                    </tr>
                        <!-- recover pasword option -->
                    <tr>
                        <td style="font-weight: bold;">Quên mật khẩu</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="
                            #myModal">Bật</button>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Trả lời và nhớ câu hỏi</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id; ?>" method="
                                            post" id="f">
                                                <strong>Thú cưng bạn đã từng nuôi?</strong>
                                                <textarea class="form-control" cols="83" rows="4" 
                                                name="cautraloi" placeholder="Điền câu trả lời của bạn vào đây..."></textarea>
                                                <br>
                                                <input class="btn btn-default" type="submit" name="nuttraloi"
                                                value="Gửi" style="width: 100px;">
                                                <br><br>
                                                <pre>Trả lời câu hỏi trên, chúng tôi sẽ hỏi lại khi bạn quên <strong>mật khẩu.</strong></pre>
                                                <br><br>
                                            </form>
                                            <?php
                                                if(isset($_POST['nuttraloi'])){
                                                    $nuttraloi = htmlentities($_POST['cautraloi']);
                                                    if($nuttraloi == ''){
                                                        echo"<script>alert('Vui lòng nhập câu trả lời của bạn!!!')</script>";
                                                        echo"<script>window.open('sua_thongtincanhan.php?user_id=$user_id','_self')</script>";
                                                        exit();
                                                    }else{
                                                        $update = "update user_1 set recovery_account='$nuttraloi'
                                                        where user_id='$user_id'";
                                                        $run = mysqli_query($con, $update);
                                                        if($run){
                                                            echo"<script>alert('Đang thay đổi...')</script>";
                                                            echo"<script>window.open('sua_thongtincanhan.php?user_id=$user_id','_self')</script>";
                                                        }else{
                                                            echo"<script>alert('Lỗi cập nhật thông tin')</script>";
                                                            echo"<script>window.open('sua_thongtincanhan.php?user_id=$user_id','_self')</script>";
                                                        }
                                                    }
                                                }
                                            ?>     
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="Submit" class="btn btn-info" name="nutsua" style="width: 250px;" value="Gửi">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['nutsua'])){
        $ten = htmlentities($_POST['ten']);
        $ho = htmlentities($_POST['ho']);
        $tentaikhoan = htmlentities($_POST['tentaikhoan']);
        $mota = htmlentities($_POST['mota']);
        $moiquanhe = htmlentities($_POST['moiquanhe']);
        $matkhau = htmlentities($_POST['matkhau']);
        $email = htmlentities($_POST['email']);
        $quocgia = htmlentities($_POST['quocgia']);
        $gioitinh = htmlentities($_POST['gioitinh']);
        $ngaysinh = htmlentities($_POST['ngaysinh']);
        $update = "update user_1 set f_name='$ten', 
                                    l_name='$ho',
                                    user_name='$tentaikhoan', 
                                    describe_user='$mota', 
                                    Relationship='$moiquanhe',
                                    user_pass='$matkhau', 
                                    user_email='$email',
                                    user_country='$quocgia', 
                                    user_gender='$gioitinh',
                                    user_birthday='$ngaysinh' 
                                    where user_id='$user_id'";
        $run = mysqli_query($con, $update);
        if($run) {
            echo"<script>alert('Đang thay đổi...')</script>";
            echo"<script>window.open('sua_thongtincanhan.php?user_id=$user_id','_self')</script>";
        }

    }
?>