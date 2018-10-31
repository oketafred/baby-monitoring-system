<?php 

	session_start();

	$_SESSION["id"] = null;
    $_SESSION["firstname"] = null;
    $_SESSION["lastname"] = null;
    $_SESSION["email"] = null;
    $_SESSION["password"] = null;


    if (!isset($_SESSION["email"])) {
       
        header("Location: ../index.php");

    }



 ?>