<?php
session_start();
include("../model/ketnoi.php"); 
    $ketnoi = new Ketnoi();
	if (isset($_POST['login'])) {
        $data['email'] = $_POST['email'];
        $data['pass'] = $_POST['pass'];
		$select_dangnhap = $ketnoi->select_dangnhap($data);
        
	}
?>