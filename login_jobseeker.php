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

<body onload="hide()">

<form action="profile_voter.php" method="POST">

<div align="center">

<table class="form_tab">

	<tr>

		<td><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>

	</tr>

	<tr>

		<td>

		<center><h3>JOBSEEKER LOGIN</h3><center>

		</td>

	</tr>

	<tr>
		<td><p id="msg" style="font-size:15px;color:red;margin-left:10%;"></p>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-address-card-o" style="font-size:20px;"></i>
		<input type="text" name="v_id" class="inputText" id="v_id" required autocomplete="off"/>
		<span class="floating-label">Email</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-lock" style="font-size:20px;"></i>
		<input type="password" name="password" id="psw" class="inputText" required autocomplete="off"/>
		<span class="floating-label">Password</span><br/>
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

		<button type="submit" class="btn" name="login" id="login" onclick="show_spin()"><p id="spin" style="display:none;">

		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> LOGIN</button>

		</td>	

	</tr>

	<tr>

		<td><br/><br/>

		<h4 style="float:right">Not a member yet? <a href="register_voter.php">REGISTER</a></h4>

		</td>

	</tr>

</table>

</div>

</form>

</body>

</html>
