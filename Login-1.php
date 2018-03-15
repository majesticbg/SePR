<?php

session_start();

$connect = mysqli_connect('studmysql01.fhict.local','dbi339174','123456','dbi339174');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (isset($_POST['enter'])) //pushing of button "LOGIN"
{
    $e_login = $_POST['username'];
    $e_password = md5($_POST['password']);

    $sql="SELECT * FROM users WHERE username = '$e_login'";

    $query = mysqli_query($connect,$sql);
    $user_data = mysqli_fetch_array($query,MYSQLI_ASSOC);

    if ($user_data['password'] == $e_password)
    {
        
        $_SESSION['username']=$e_login;
        setcookie("cookie_name","$e_login",time()+7200,"/");
        header("Location: index.php");
    exit;
    }
    else
    {
        echo "Wrong login or password";
    }
}
?>

<!document html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="settings.css">
<title> LOGIN</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script> 

</head>
<body background="http://s8.postimg.org/fj9z9eaf9/back.jpg">
<?php include 'home.php';?>
<div id="centermeplease" class="relative">
    <br><br>
    <div id="white">
<form method="post">
<h1 > Log In</h1>
  Username:<br>

  <input type="text" name="username"><br>
   Password:<br>
  <input type="password" name="password">
    <br><br>
   
  <button type="submit" name="enter"login>Log In </button>
<a id="reg"; href="Registor.php">Register</a>


</form>
        </div>
</div>
</body>
</html>