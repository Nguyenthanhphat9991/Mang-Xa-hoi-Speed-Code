<?php
global $con;
if (isset($_GET['user_id'])) {
    $user_id = ($_GET['user_id']);
}

$get_postsemail = "select user_email from user_1 where user_id = '$user_id'";

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
    echo "<script>window.open('v_profile.php?user_id=$user_id', '_self')</script>";
}
else{
    echo "
     <a href='./v_xem_post.php?post_id=$post_id' style='float:right;'>
        <button class='btn btn-success'>Xem</button>
    </a>
    <a href='v_sua_posts.php?post_id=$post_id' style='float:right;'>
        <button class='btn btn-info'>Sửa</button>
    </a>
    <a href='../controler/c_xoa_posts.php?post_id=$post_id' style='float:right;'>
        <button class='btn btn-danger'>Xóa</button>
    </a>
</div><br><br><br>
";
}