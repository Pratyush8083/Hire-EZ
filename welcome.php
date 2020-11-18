<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>   

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Welcome Page</title>
	<script src="js/hidelogo.js"></script>

</head>

<body> 
<div align="center">
<table class="welcome_tab" style="background:#e6fff2;"> 
	<tr>
		<td><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>
	</tr>

	<tr>
		<td><br/>
		<h3>Welcome</h3><h2><?php echo $_SESSION["username"] ?></h2>
		</td>
	</tr>	

	<tr>
		<td><br/>
		You are registered successfully. Please read our terms carefully.
		</td>
	</tr>
	
	<tr>
		<td>
		<div class="agree">
		<center><u><h4>Terms and Conditions ("Terms")</h4></u></center>
		<br/>
		<p>Please read these Terms and Conditions carefully before using the Smart Online Hiring Application, Hire-EZ (the "Service") operated by <b>ANURAG, PRATYUSH, SHUBHAM and NISHA</b>.</p>

		<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>

		<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>

		<br/>
		<h4>Accounts</h4>

		<p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

		<p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

		<p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>

		<br/>
		<h4>Termination</h4>

		<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

		<p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

		
		</div>
		</td>
	</tr>

	<tr>
		<td><br/><br/>
		<button type="button" class="btn" name="home" id="continue" onclick = "window.location.href='index.php'">BACK TO HOMEPAGE</button>
		</td>
	</tr>  

</table>
</div>
</body>   
</html>
<?php
session_destroy();
?>