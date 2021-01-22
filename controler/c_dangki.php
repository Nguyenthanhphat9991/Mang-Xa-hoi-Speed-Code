<?php
    include("../model/ketnoi.php"); 

    $ketnoi = new Ketnoi();
	if(isset($_POST['dangki'])){
        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['u_pass']) 
        && isset($_POST['u_email']) && isset($_POST['u_country']) && isset($_POST['u_gender'])&& isset($_POST['u_birthday'])) {
            if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['u_pass']) 
            && !empty($_POST['u_email']) && !empty($_POST['u_country']) && !empty($_POST['u_gender'])&& !empty($_POST['u_birthday'])){
                $newgid = sprintf('%05d', rand(0, 999999));
                $mota = "hello speed code";
                $moiquanhe = "ddocj than";
                $hinhdaidien = "../assets/images/avatar_mac_dinh.png";
                $hinhbia = "../assets/images/banner.png";

                $insert['first_name'] = $_POST['first_name'];
                $insert['last_name'] = $_POST['last_name'];

                $user_name= ($insert['first_name']. "_" .$insert['last_name']. "_" .$newgid);

                $insert['user_name'] = $user_name;
                $insert['describe_user'] = $mota;
                $insert['Relationship'] = $moiquanhe;
                $insert['user_pass'] = $_POST['u_pass'];
                $insert['user_email'] = $_POST['u_email'];
                $insert['user_country'] = $_POST['u_country'];
                $insert['user_gender'] = $_POST['u_gender'];
                $insert['user_birthday'] = $_POST['u_birthday'];
                $insert['user_image'] = $hinhdaidien;
                $insert['user_cover'] = $hinhbia;
           
                $insert['status'] = "hoatdong";
                $insert['posts'] = "no";;
                $insert['recovery_account'] = "Chua kich hoat";

                $update = $ketnoi->insert_dangki($insert);

                if($insert){
                    echo "<script>alert('đăng kí thành công');</script>";
                    echo "<script>window.location.href = '../view/v_dangnhap.php';</script>";
                }else{
                    echo "<script>alert('lỗi');</script>";
                    echo "<script>window.location.href = '../view/v_dangnhap.php';</script>";
                }
            }else{
                    echo "<script>alert('rỗng');</script>";
                    echo "<script>window.location.href = '../view/v_dangnhap.php';</script>";
                }
            }
        }
        
		
?>
