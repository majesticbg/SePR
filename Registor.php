
<?php
session_start();




$connect = mysqli_connect('studmysql01.fhict.local','dbi339174','123456','dbi339174');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (isset($_POST['submit']))
{
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
	$address = $_POST['address'];
	$mail = $_POST['email'];
	$name = $_POST['username'];
	$password = $_POST['password'];
	
 if (strlen($password)<5)
        {

            echo "
			<script>
			alert(\"Password should have be more than 5 characters\");
			</script>";
        }
 elseif(!preg_match("~([a-zA-Z0-9!#$%&\'*+-/=?^_`{|}\~])@([a-zA-Z0-9-]).([a-zA-Z0-9]{2,4})~", $mail))
        {
             echo "
			<script>
			alert(\"Your email is not valid\");
			</script>";
                
        }
 elseif(!preg_match('|^[-Ð-Ð¯Ð°-ÑA-Za-z0-9_]*$|',$name))
        {
            echo "
			<script>
			alert(\"Username has invalid symbols\");
			</script>";
           
        }
		else
		{
			
    $password = md5($password);
    $query = mysqli_query($connect ,("INSERT INTO users VALUES('$firstname','$lastname','$dob','$address','$mail','$name','$password')"));
          echo"
			<script>
			alert(\"Account successfully created!\");
			</script>";
		}
 

}



?>
<script> 
function recaptchaCallback() {
    $('#submitBtn').removeAttr('disabled');
};
</script>

<!document html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="settings.css">
<title> Register</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script> 


</head>
<center><body background="http://s8.postimg.org/fj9z9eaf9/back.jpg">
<?php include 'home.php';?>
  
    
<div class="relative">
    <br>
	
	<div id="white">
<form action="Registor.php" method="POST">
<h1> Registration form</h1>
     First Name:<br>
  <input type="text" name="firstname" required><br>
      Last Name: <br>
  <input type="text" name="lastname" required><br>
  Date of Birth:<br>
  <input type="date" name="dob" required> <br>
        Address:<br>
  <input type="text" name="address" required><br>
         E-mail:<br>
  <input type="email" name="email" required><br>
       Username:<br>
  <input type="text" name="username" required><br>
       Password:<br>
  <input type="password" name="password" required><br><br>
  
 <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdrL0wUAAAAAGK3OnrA-1XIKmuLFJhaCJ7-3gLa"></div>
 <br><br>
  <input id="submitBtn" type="submit" name="submit" value="Registration" disabled> <br><br><br><br><br><br>
</form>
    </div>



    <br><br><br>
</div>

</body>




</html>