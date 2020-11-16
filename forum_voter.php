<!DOCTYPE HTML>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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

<title>MANAGE PROFILE</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>    
	<center><p class="header_text">MANAGE PROFILE</p></center>
</div>
</nav>

<div align="center" id="main_form">	
	<form>
	<table class="form_tab">
	
	<tr>
		<td>
			<a href="profile_voter.php" class="up_btn" style="margin-left:77%;">BACK TO PROFILE</a>		
			<a href="logout.php" class="up_btn">EDIT</a>
		</td>
	</tr>

	<tr>
		<td><hr/><h4>My Qualifications:</h4></td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Highest qualification</span><br/></div>
		</td>
	</tr>
	
	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-picture-o" style="font-size:20px;"></></i>
		<div style="background:skyblue;width:300px;padding:10px;margin-left: 10%;">
			<input type="file" name="file" accept="image/*" capture="camera" required/>
		</div>
		<span class="floating-label">Upload certificate (image only)</span><br/>
		<p id="msg" style="font-size:14px;color:red;margin-left:10%;"></p>
		</div>
		</td>
	</tr>
	
	<tr>
		<td><hr/><h4>Profession Type:</h4></td>
	</tr>
	
	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Profession Type</span><br/></div>
		</td>
	</tr>

	<tr>
		<td><hr/><h4>My Experiences:</h4></td>
	</tr>

	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Current Company</span><br/></div>
		</td>
	</tr>	
	
	<tr>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="worth" id="worth" class="inputText" autocomplete="off" required/>
		<span class="floating-label">Experience (in years)</span><br/></div>
		</td>
	</tr>
	
	<tr>
		<td>
			<a href="profile_voter.php" class="up_btn" style="margin-left:77%;">Add</a>
		</td>
	</tr>

	<tr>
		<td><br/>
		<button type="submit" class="btn" name="continue" id="continue" onclick="show_spin()"><p id="spin" style="display:none;">
		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> SAVE PROFILE</button>
		</td>
	</tr>
	
	</table>
	</form>
</div>

</body>
</html>

