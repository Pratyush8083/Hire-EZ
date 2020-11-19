<?php
	ob_start();
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

	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

    <script>
	$(function() {  
        $( "#dob" ).datepicker({
          dateFormat: 'yy/mm/dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-18",
          clickInput: true,
        });
      });
	</script>

<title>JobSeeker Registration</title>
</head>

<body>
<div align="center" id="main_form">	
	<form action="register_jobseeker.php" method="POST">
	<table class="form_tab">
	<tr>
		<td colspan=5><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>
	</tr>
	
	<tr>
		<td colspan=5>
			<center><h3>JOBSEEKER REGISTRATION</h3></center>
		</td>
	</tr>

	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="username" id="username" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Name</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-calendar" style="font-size:20px;"></i>
		<input type="text" name="dob" id="dob" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Date of Birth</span><br/>
		</div>
		</td>
	</tr>
	
	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="phone" id="phone" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Phone</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-envelope-o" style="font-size:20px;"></i>
		<input type="email" name="email" id="email" autocomplete="off" class="inputText" required/>
		<span class="floating-label">E-mail Address</span><br/>
		<p id="msg" style="font-size:14px;color:red;margin-left:10%;"></p>
		</div>
		</td>
	</tr>
	
	<tr>
		<td><u><h4>Communication Address</h4></u></td>
		<td>
			<div class="user-input-wrp"><br/>
			<input type="text" name="street" id="street" autocomplete="off" class="inputText" required/>
			<span class="floating-label">Street</span><br/>
			</div>
		</td>
		<td>
			<div class="user-input-wrp"><br/>
			<input type="text" name="city" id="city" autocomplete="off" class="inputText" required/>
			<span class="floating-label">City</span><br/>
			</div>
		</td>
		<td>
			<div class="user-input-wrp"><br/>
			<input type="text" name="state" id="state" autocomplete="off" class="inputText" required/>
			<span class="floating-label">State</span><br/>
			</div>
		</td>
		<td>
			<div class="user-input-wrp"><br/>
			<input type="text" name="country" id="country" autocomplete="off" class="inputText" required/>
			<span class="floating-label">Country</span><br/>
			</div>
		</td>
	</tr>

	<tr>
	<td><h4>Profession Type</h4></td>
		<td><input type="radio" name="p_type" value="fresher" onchange="show_prof()" required>&nbsp Fresher</td>
		<td><input type="radio" name="p_type" value="professional" onchange="show_prof()" required>&nbsp Professional</td>
		<td><input type="radio" name="p_type" value="freelancer" onchange="show_free()" required>&nbsp Freelancer</td>
	</tr>

	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-key" style="font-size:20px;"></></i>
		<input type="password" name="password" id="password" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Enter New Password &nbsp&nbsp<progress max="100" value="0" id="meter"></progress></span><br/>
		<p id="match_n" class="textbox"></p>
		</td>
	</tr>

	<!-- check password strength -->
<script>
    var code = document.getElementById("password");


	  var strengthbar = document.getElementById("meter");
	  var display = document.getElementsByClassName("textbox")[0];
	  code.addEventListener("keyup", function() {
	    checkpassword(code.value);
	  });


	  function checkpassword(password) {
	  	
	    var strength = 0;
	    if (password.match(/[a-z]+/)) {
	      strength += 1;
	    }
	    if (password.match(/[A-Z]+/)) {
	      strength += 1;
	    }
	    if (password.match(/[0-9]+/)) {
	      strength += 1;
	    }
	    if (password.match(/[$@#&!]+/)) {
	      strength += 1;

	    }

	    if (password.length < 8) {
	      display.innerHTML = "Password should contain mixture of uppercase, lowercase letters, numbers and at least one special character, e.g., $@#&!. Do not use < or >";
	    }

	    switch (strength) {
	      case 0:
	        strengthbar.value = 0;
	        break;

	      case 1:
	        strengthbar.value = 25;	   
	        break;

	      case 2:
	        strengthbar.value = 50;
	        break;

	      case 3:
	        strengthbar.value = 75;
	        break;

	      case 4:
	        strengthbar.value = 100;
	        break;
	    }
	  }
  </script>

	<tr>
		<td colspan=5><br/>
		<button type="submit" class="btn" name="continue" id="continue" onclick="show_spin()"><p id="spin" style="display:none;">
		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> REGISTER</button>
		</td>
	</tr>

	<tr>
		<td colspan=5>
		<br/><b style="float:right">Already a member? <a href="login_jobseeker.php">LOG IN</a></b>
		</td>
	</tr>
	</table>
	</form>
</div>

</body>

</html>

<?php  
include("db_connection.php");
if(isset($_POST['continue']))  

{  

    $username=$_POST['username'];
	$dob=$_POST['dob'];       
	$phone=$_POST['phone'];
	$email=$_POST['email'];  
	$street=$_POST['street'];  
	$city=$_POST['city'];  
	$state=$_POST['state'];  
	$country=$_POST['country'];  
	$p_type=$_POST['p_type'];
	$password=$_POST['password'];

	$sql="select * from job_seeker WHERE email=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) 
	{ ?>
        <script>
			document.getElementById('msg').innerHTML = "E-mail already exists!!";
		</script>";
	<?php }
	else
	{  
	$enc_psw = password_hash($password, PASSWORD_DEFAULT);
    $insert_user="insert into job_seeker (name,dob,phone_no,email,street,city,state,country,profession_type,password) VALUES (?,?,?,?,?,?,?,?,?,?)";  
    $stmt = $conn->prepare($insert_user);

	$stmt->bind_param("ssssssssss", $username, $dob, $phone, $email, $street, $city, $state, $country, $p_type, $enc_psw);

	if($stmt->execute())  
    {  
		$_SESSION["username"] = $username;
        header("Location: welcome.php");		
	}  
	} 
}
?>  
