<!DOCTYPE html>
<?php
session_start();
include("./v_header.php");
if(isset($_GET['nuttimkiem'])){
    $keysearch = htmlentities($_GET['keysearch']);
}
if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
?>
<html>

<head>
    <title>Kết quả tìm kiếm </title>
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
            <center><h2>Kết quả tìm kiếm "<?php echo $keysearch ?>"</h2></center>
            <?php timkiembaiviet(); ?>
        </div>
    </div>
</body>
</html>
