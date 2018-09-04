<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Signup Page</title>
<link href="CSS/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div align="center"><br/><h1>Register here</h1><p> Whatever subtitle you wanna put here. </p></div>
<br/><br/>
<div align="center">
	<div style="width:500px; border: solid 1px #333333; " align="left">
		<div style="background-color:#333333; color:#FFFFFF; padding:12px;">Registration</div>
		<div style="margin:30px">
            <form method="POST" action="" enctype="multipart/form-data" style="width: 125%;">
                <input class="TB" name="username" type="text" value="uid" size="10" placeholder="Username" required><br/>
                <input class="TB" name="password" type="password" value = "pwd" size="16" placeholder="Password" required><br/>
                <input class="TB" name="name" type="text" placeholder="Full Name" required><br/>
                <input class="TB" name="email" type="email" placeholder="Email ID" required><br/><br/>
                <input name="signup" class="formButton" type="submit" value="Sign up">&nbsp;
                <input name="clear" class="formButton" type="reset" value="Reset"> 
            </form>
		</div>
	</div>
</div>

<?php
    include("config.php");

	if(isset($_POST["signup"])){
                
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        
        $password_encrypt = password_hash($password, PASSWORD_DEFAULT);
        $queryInsUser = "INSERT INTO user (username, passcode, name, email) VALUES ('{$username}', '{$password_encrypt}', '{$name}', '{$email}')";
        
        if (!(@mysqli_query ($db, $queryInsUser))) {
            print '<br/><b style="color:#B60000">Exception:</b> ';
            throw new Exception(showerror($db));
        } else {
            print '<br/> Registration successful!';
        }
	}
?>
</body>
</html>