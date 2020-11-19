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

	  function show_com()
		{
			document.getElementById('reg_div').style.display="block";
			document.getElementById('site_div').style.display="block";
			document.getElementById('ssn_div').style.display="none";
		}

		function show_ind()
		{
			document.getElementById('ssn_div').style.display="block";
			document.getElementById('reg_div').style.display="none";
			document.getElementById('site_div').style.display="none";
		}
	</script>

	<title>Employer Registration</title>
</head>

<body>
<div align="center" id="main_form">	
	<form action="register_employer.php" method="POST">
	<table class="form_tab">
	<tr>
		<td colspan=3><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>
	</tr>
	
	<tr>
		<td colspan=3>
			<center><h3>EMPLOYER REGISTRATION</h3></center>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="cname" id="cname" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Name</span><br/>
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
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="desc" id="desc" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Description</span><br/>
		</div>
		</td>
	</tr>
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="address" id="address" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Address</span><br/><br/><br/>
		</div>
		</td>
	</tr>

	<tr>
	<td><u><h4>Employer Type</h4></u></td>
		<td><input type="radio" name="e_type" value="company" onchange="show_com()" required>&nbsp Company Employer</td>
		<td><input type="radio" name="e_type" value="individual" onchange="show_ind()" required>&nbsp Individual Employer</td>
	</tr>

	<tr>
		<td colspan=3>
		<div id="reg_div" class="user-input-wrp" style="display:none"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="reg" id="reg" class="inputText" autocomplete="off"/>
		<span class="floating-label">Registration number</span><br/></div>
		</td>
	</tr>
	
	<tr>
		<td colspan=3>
		<div id="site_div" class="user-input-wrp" style="display:none"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="site" id="site" class="inputText" autocomplete="off"/>
		<span class="floating-label">Website</span><br/></div>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<div id="ssn_div" class="user-input-wrp" style="display:none"><br/>
		<i class="fa fa-users" style="font-size:20px;"></i>
		<input type="text" name="ssn" id="ssn" class="inputText" autocomplete="off"/>
		<span class="floating-label">SSN</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-key" style="font-size:20px;"></></i>
		<input type="password" name="password" id="password" autocomplete="off" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Enter Password &nbsp&nbsp<progress max="100" value="0" id="meter"></progress></span><br/>
		<p id="match_n" class="textbox"></p>
		</td>
	</tr>

	<!-- check password -->
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
	      display.innerHTML = "At least 8 characters, Mixture of uppercase, lowercase letters, numbers and at least one special character, e.g., $@#&!. Do not use < or >";
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
		<td colspan=3><br/>
		<button type="submit" class="btn" name="continue" id="continue"></p> REGISTER</button>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<br/><b style="float:right">Already a member? <a href="login_candidate.php">LOG IN</a></b>
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

	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$desc=$_POST['desc'];       
	$address=$_POST['address'];
	$e_type=$_POST['e_type'];  
	$reg=$_POST['reg'];  
	$site=$_POST['site'];  
	$ssn=$_POST['ssn']; 
	$password=$_POST['password'];

	$sql="select * from employer WHERE email=?";
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
    $insert_user="insert into employer (name,email,description,address,employer_type,password) VALUES (?,?,?,?,?,?)";  
    $stmt = $conn->prepare($insert_user);
	$stmt->bind_param("ssssss", $cname, $email, $desc, $address, $e_type, $enc_psw);

	$inserted = $stmt->execute();

	$sql="select eid,employer_type from employer WHERE email=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();

	$row = $result->fetch_assoc();
	$eid = $row['eid'];
	$type = $row['employer_type'];
	if($type == "company")
	{
		$insert_user="insert into company_employer (eid,reg_no,website) VALUES (?,?,?)";  
		$stmt = $conn->prepare($insert_user);
		$stmt->bind_param("sss", $eid, $reg, $site);
		$stmt->execute();
	}
	else
	{
		$insert_user="insert into individual_employer (eid,ssn) VALUES (?,?)";  
		$stmt = $conn->prepare($insert_user);
		$stmt->bind_param("ss", $eid, $ssn);
		$stmt->execute();
	}
	ob_end_flush();
	if($inserted){
		$_SESSION["username"] = $cname;
    	echo "<script>window.location.href='welcome.php'</script>";
	}
	}
}
?>