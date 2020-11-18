<?php
	session_start();
?>

<!DOCTYPE HTML>
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

<form action="login_jobseeker.php" method="POST">

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
		<input type="text" name="email" class="inputText" id="email" required autocomplete="off"/>
		<span class="floating-label">Email</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-lock" style="font-size:20px;"></i>
		<input type="password" name="password" id="password" class="inputText" required autocomplete="off"/>
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

		<h4 style="float:right">Not a member yet? <a href="register_jobseeker.php">REGISTER</a></h4>

		</td>

	</tr>

</table>

</div>

</form>

</body>

</html>

<?php  
  
include("db_connection.php");  
  
if(isset($_POST['login']))  
{  
	$email = $_POST['email'];
    $password = $_POST['password']; 
	$sql = "select password from job_seeker WHERE email = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$res = $stmt->get_result();
	$hash = "";
	if($res->num_rows > 0)
	{
		while($row = $res->fetch_assoc())
		{
			$hash = $row['password'];
		}
	}
	$verify = password_verify($password, $hash);
	if($verify == 1)
	{   
		$_SESSION["email"] = $email;
    	echo "<script>window.location.href='profile_jobseeker.php'</script>";
    }  
    else  
    {  
    ?>
    <script>document.getElementById('msg').innerHTML = "Incorrect Password. Try again!"; </script>
    <?php 
	}  
}  
?>