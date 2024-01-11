<?php

require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = connectionDB();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    var_dump(authentication($conn, $log_email, $log_password));
}