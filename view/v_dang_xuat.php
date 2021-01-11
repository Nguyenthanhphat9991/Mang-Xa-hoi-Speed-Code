<?php
session_start();

session_destroy();

header("location: http://localhost:800/speed_code/");
?>