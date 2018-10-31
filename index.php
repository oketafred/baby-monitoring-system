<?php 

    session_start();

    $errorEmail = "";
    $errorPassword = "";

    if (isset($_SESSION["email"])) {
       
        header("Location: dashboard.php");

    }

    include "include/db_connect.php";


    if (isset($_POST["login"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email)) {
            $errorEmail = "Email is Required";
        }
        if (empty($password)) {
            $errorPassword = "Password is Required";
        }

        $query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "QUERY FAILED";
        }

        while ($row = mysqli_fetch_array($result)) {
            $db_user_id = $row["user_id"];
            $db_user_firstname = $row["user_firstname"];
            $db_user_lastname = $row["user_lastname"];
            $db_user_email = $row["user_email"];
            $db_user_password = $row["user_password"];


            //Checking for Successful Login

            if ($email !== $db_user_email AND $password !== $db_user_password) {
            
                header("Location: index.php");

            }
            if ($email == $db_user_email AND $password == $db_user_password) {

                $_SESSION["id"] = $db_user_id;
                $_SESSION["firstname"] = $db_user_firstname;
                $_SESSION["lastname"] = $db_user_lastname;
                $_SESSION["email"] = $db_user_email;
                $_SESSION["password"] = $db_user_password;

                header("Location: dashboard.php");

            }else{

                header("Location: index.php");

            }


        }

        






    }






 ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Baby Monitor - Continous Health Monitoring</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    	.icon{
    		margin: auto;
    		align-content: center;
    	}
    	.img-custom{
    		width: 100px;
    		height: 100px;
    		margin-left: 120px;
    		margin-top: 80px;
    	}
    	.form-custom{
    		margin-top: 30px;
    	}
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            	<div class="icon">
            		<img src="images/baby.png" class="img-responsive img-circle img-custom">
            	</div>
                <div class="login-panel panel panel-default form-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Sign in to Baby Monitor</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    <span class="text-danger"><?php echo $errorEmail; ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                    <span class="text-danger"><?php echo $errorPassword; ?></span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-primary btn-block" name="login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
