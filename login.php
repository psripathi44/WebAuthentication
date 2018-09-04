<?php
include("config.php");		//This is setting up connection with DB
session_start();			//Session begin
$error= "";					//To capture the error message if username and password is incorrect

if(isset($_SESSION['login_user']))  //This will redirect to the welcome page, without again showing the login page.
	header("location: welcome.php");

if(isset($_POST["login"])){	
	// username and password sent from form 
	$myusername=mysqli_real_escape_string($db,$_POST['username']); 
	$mypassword=mysqli_real_escape_string($db,$_POST['password']); 

	$sql="SELECT username, passcode FROM user WHERE username='$myusername'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count=mysqli_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1
	if($count == 1 && password_verify($mypassword, $row["passcode"])){
		$_SESSION['login_user']=$myusername;
		header("location: welcome.php");
	} else
		$error="Your Login Name or Password is invalid";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<link href="CSS/styles.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF">
<div align="center"><br/><h1>It's a Login page</h1><p> Whatever subtitle you wanna put here. </p></div>
<br/><br/>
<div align="center">
	<div style="width:400px; border: solid 1px #333333; " align="left">
		<div style="background-color:#333333; color:#FFFFFF; padding:12px;">Login</div>
		<div style="margin:20px 0 40px 50px">
			<form action="" method="post">
				<input type="text" class="TB" name="username" class="box" placeholder="username"><br /><br />
				<input type="password" class="TB" name="password" class="box" placeholder="password"><br/><br />
				<input name="login" class="formButton" type="submit" value=" Submit"> &nbsp;
				<input type="reset" class="formButton" value=" Reset">
			</form>
			<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ?></div>
		</div>
	</div>
</div>
</body>
</html>
