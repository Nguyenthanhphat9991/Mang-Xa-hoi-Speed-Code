<!DOCTYPE html>
<html lang="en">

<head>
    <title>Speed code đăng nhập và đăng kí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./assets/images/banner.png");
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .hero-text button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 10px 25px;
        color: black;
        background-color: #ddd;
        text-align: center;
        cursor: pointer;
    }

    .hero-text button:hover {
        background-color: #555;
        color: white;
    }



    #dangki{
		width: 60%;
		border-radius: 30px;
	}

	#dangnhap{
		width: 60%;
		background-color: #fff;
		border: 1px solid #1da1f2;
		color: #1da1f2;
		border-radius: 30px;
	}
	#dangnhap:hover{
		width: 60%;
		background-color: #fff;
		color: #1da1f2;
		border: 2px solid #1da1f2;
		border-radius: 30px;
	}
	.well{
		background-color: #187FAB;
	}

    </style>
</head>

<body>
    <div class="hero-image">
        <div class="hero-text">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8" style="left:0.5%;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

  
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

  
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="./assets/images/covit.png" alt="Design App Covid" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="./assets/images/event.png" alt="Design App Event" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="./assets/images/shoping.png" alt="Design App Shopping" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="./assets/images/sushi.png" alt="Design App Sushi" style="width:100%;">
                    </div>
                </div>

                
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

        <div class="col-sm-4" style="left:8%:">
            <h1><strong>SPEED CODE.</strong></h1>
            <h4><strong>Tự Học Lập Trình.</strong></h4>
            <h4><strong>Tham gia Speed Code với chúng tớ nào.</strong></h4>

            <form method="post" action="">
				<button id="dangki" class="btn btn-info btn-lg" name="dangki">Đăng Kí</button><br><br>
				<?php
					if(isset($_POST['dangki'])){
						echo "<script>window.open('./view/v_dangki.php','_self')</script>";
					}
				?>
				<button id="dangnhap" class="btn btn-info btn-lg" name="dangnhap">Đăng Nhập</button><br><br>
				<?php
					if(isset($_POST['dangnhap'])){
						echo "<script>window.open('./view/v_dangnhap.php','_self')</script>";
					}
				?>
			</form>
        </div>
    </div>
</body>
</html>