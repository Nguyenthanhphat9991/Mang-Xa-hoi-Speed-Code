<!DOCTYPE html>

<?php 
    session_start();
    include('./v_header.php');

    if(!isset($_SESSION['user_email'])){
        header("location: ../index.php");
    }
?>

<html lang="en">

<head>
    <title>
        Xem bài viết
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/styles/style_profile.css">

</head>

<body>
    <div class='row'>
        <div class="col-sm-12">
            <center><h2>Bình luận:</h2><br></center>
            <?php 
                trang_post();
            ?>
        </div>
    </div>
</body>
</html>