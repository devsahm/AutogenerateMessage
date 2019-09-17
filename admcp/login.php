<?php
session_start();
include'connection.php';
$error="";
if (array_key_exists("submit", $_POST)) {
    
    if (!$_POST['username']) {
        $error="username must not be empty";
    }

    if (!$_POST['password']) {
        $error="password is required";
    }

    if ($error !="") {
        echo $error;
    }else{
            $sql="SELECT id FROM logins WHERE email='".mysqli_real_escape_string($conn, $_POST['username'])."' ";
            $username = mysqli_query($conn, $sql);

                if (mysqli_num_rows($username) > 0 ) {
                    $usernamerow = mysqli_fetch_array($username);
                    $id = $usernamerow['id'];
                    $hashedpassword= md5(md5($usernamerow['id']).$_POST['password']);
                    $sql= "SELECT * FROM logins WHERE email='".mysqli_real_escape_string($conn, $_POST['username'])."' AND password='". $hashedpassword."' ";
                    $loginsql=mysqli_query($conn, $sql);
              
                        if (mysqli_num_rows($loginsql) > 0) {
                            $_SESSION['id']=$usernamerow['id'];
                            setcookie("id", $usernamerow['id'], time() + 60*60);
                            header("Location:admin.php");
                        } else {
                            $error="Password and Username does not match";
                        }
                    
                } else {
                    $error="User not found";
                }

           }
}
  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN- BOOTCAMP 2019</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Admin Log in</div>
				<div class="panel-body">
					<form role="form" method="post">
						<?php 
                       if ($error!="") {
                       	echo "<p class='alert alert-danger'> $error</p>";
                       }

						?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="password" name="password" type="password" value="">
							</div>
							
							<button class="btn btn-primary" name="submit">Log in</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
