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
	<title>Tìm kiếm bạn bè</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/styles/style_home.css">
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <center><h2>Find New People</h2></center><br><br>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <form class="search_form" action="">
                        <input type="text" placeholder="Tìm bạn bè" name="search_user">
                            <button class="btn btn-info" type="submit" 
                            name="search_user_btn">Tìm</button>
                    </form>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <br>
            <br>
            <?php timkiem(); ?>
        </div>
    </div>
</body>
</html>