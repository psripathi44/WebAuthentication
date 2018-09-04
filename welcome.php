<?php
    include('config.php');
    session_start();

    $user_check=$_SESSION['login_user'];
    
    $ses_sql=mysqli_query($db,"select username from user where username='$user_check' ");
    $userRecord=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session=$userRecord['username'];

    if(!isset($login_session))
        header("Location: login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome </title>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>

<h2><a href="logout.php">Sign Out</a></h2>
</body>
</html>
