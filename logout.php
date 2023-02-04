<?php
session_start();
$con = mysqli_connect("localhost", "astro_user", "VuEpEARll3ReG", "astro_proiectdaw", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
$insert_login = "UPDATE users SET logged_in = 0 WHERE email = '" . $_SESSION['email'] . "'";
            mysqli_query($con, $insert_login);
session_destroy();
header("Location: index.php");
exit;