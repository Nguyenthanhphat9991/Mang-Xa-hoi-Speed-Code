<?php 
    include("../model/m_ketnoidb.php"); 

    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $delete_post = "delete from posts where post_id='$post_id'";

        $run_delete = mysqli_query($con, $delete_post);

        if($run_delete >= 1){
            echo"<script>alert('Xóa thành công')</script>";
            echo "<script>window.open('../view/home.php', '_self')</script>";
        }
    }


?>

