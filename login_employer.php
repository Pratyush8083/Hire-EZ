<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<title>Login Form</title>

</head>

<body>

<form action="profile_candidate.php" method="POST">

<div align="center">

<table class="form_tab">

	<tr>

		<td><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>

	</tr>

	<tr>

		<td>

		<center><h3>CANDIDATE SIGN-IN</h3><center>

		</td>

	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-envelope-o" style="font-size:20px;"></></i>
		<input type="text" name="c_id" id="c_id" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Your Candidate ID</span><br/>
		<p id="msg" style="font-size:14px;color:red;margin-left:10%;"></p>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-lock" style="font-size:20px;"></i>
		<input type="password" name="password" id="psw" class="inputText" required autocomplete="off"/>
		<span class="floating-label">Your Password</span><br/>
		</div>
		</td>
	</tr>

	<tr>

		<td><br/>

		<a href="" onclick="return troubleLogin();"><h5 style="float:left">Trouble Logging In?</h5></a>

		</td>

	</tr>

	<script type="text/javascript">
		function troubleLogin()
		{
			alert("Please contact administrator to reset password");
		}
	</script>

	<tr>

		<td><br/><br/>

		<button type="submit" class="btn" name="login" id="login">LOGIN</button>

		</td>	

	</tr>

	<tr>

		<td><br/><br/>

		<h4 style="float:right">Not a member yet? <a href="register_candidate.php">REGISTER</a></h4>

		</td>

	</tr>

</table>

</div>

</form>

</body>

</html>