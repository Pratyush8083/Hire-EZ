<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<title>ELECTION COMMISSION OFFICER SIGN-IN</title>
</head>

<body>
	<div align="center">
		<form action="dashboard_admin.php" method="POST">
			<table class="form_tab">
				<tr>
					<td>
						<center>
							<a href="index.php"><img src="images/logo3.png" height=50/></a>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							<h3>ELECTION COMMISSION OFFICER SIGN-IN</h3>
							<center>
					</td>
				</tr>
				<tr>
					<td>
						<p id="msg" style="font-size:15px;color:red;margin-left:10%;"></p>
						<div class="user-input-wrp">
							<br/> <i class="fa fa-address-card-o" style="font-size:20px;"></i>
							<input type="text" name="admin" class="inputText" autocomplete="off" required/> <span class="floating-label">Election Commission Officer Id</span>
							<br/> </div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="user-input-wrp">
							<br/> <i class="fa fa-lock" style="font-size:20px;"></i>
							<input type="password" name="password" id="psw" class="inputText" autocomplete="off" required/> <span class="floating-label">Password</span>
							<br/> </div>
					</td>
				</tr>
				<tr>
					<td>
						<br/>
						<br/>
						<button type="submit" class="btn" name="login" id="login">LOGIN</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>