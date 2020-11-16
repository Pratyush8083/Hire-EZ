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

	<title>Employer Registration</title>
</head>

<body>
<div align="center" id="main_form">	
	<form action="welcome.php" method="POST">
	<table class="form_tab">
	<tr>
		<td><center><a href="index.php"><img src="images/logo3.png" height=50/></a></center></td>
	</tr>
	
	<tr>
		<td>
			<center><h3>EMPLOYER REGISTRATION</h3></center>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="username" id="username" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Name</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="desc" id="desc" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Description</span><br/>
		</div>
		</td>
	</tr>
	
	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="desc" id="desc" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Company Address</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="income" id="income" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Employer Type</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Registration number</span><br/>/div>
		</td>
	</tr>
	
	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Website</span><br/>/div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-users" style="font-size:20px;"></i>
		<input type="text" name="partyname" id="partyname" class="inputText" autocomplete="off" required/>
		<span class="floating-label">SSN</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td>
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
		<td><br/>
		<button type="submit" class="btn" name="continue" id="continue"></p> REGISTER</button>
		</td>
	</tr>

	<tr>
		<td>
		<br/><b style="float:right">Already a member? <a href="login_candidate.php">LOG IN</a></b>
		</td>
	</tr>
	</table>
	</form>
</div>

</body>

</html>

