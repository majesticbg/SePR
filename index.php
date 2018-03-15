<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdrL0wUAAAAAMCHUo6jhxRx1gppxenxzUDXLaSL',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
?>

<html>
<head><link rel="stylesheet" type="text/css" href="settings.css">
<title>Rodopa Travels</title>
</head>
<center><body bgcolor="#30558A" background="http://s8.postimg.org/fj9z9eaf9/back.jpg"> </body>
<?php include 'home.php';?>
    
<div class="image">

      <img src="https://www.cpp.edu/~international/study-abroad/img/jXMx4mQz6MsnhP1FSKp2TJMt.jpeg" alt=""width="550" height="400" />
      
<h2><span>Paris-25 May <br /> 300 euros 3 days</span></h2>
</div>
    


<?php include 'footer.php';?>
    
</ul>
</body>
</html>