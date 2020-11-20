<?php
session_start();  
if(!$_SESSION['email'])  
{  
      header("Location: login_employer.php");//redirect to login page to secure the welcome page without login access.  
}
?>

<!DOCTYPE HTML>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">        
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/hidelogo.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>   

</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">CREATE JOB POST</p></center>
    
    </div>
</nav>

<div align="center" id="main_form">	
<form action="jobs.php" method="POST">

	<table class="form_tab">	
	<tr>
        <td>
            <br/><a href="profile_employer.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="title" id="title" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Title</span><br/>
		</div>
		</td>
	</tr>
	
	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-user-circle-o" style="font-size:20px;"></i>
		<input type="text" name="type" id="type" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Type</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=5>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-envelope-o" style="font-size:20px;"></i>
		<input type="text" name="desc" id="desc" autocomplete="off" class="inputText" required/>
		<span class="floating-label">Job Description</span><br/>
		<p id="msg" style="font-size:14px;color:red;margin-left:10%;"></p>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=3><br/>
		<button type="submit" class="btn" name="create_job" id="create_job"></p> Create Job</button>
		</td>
	</tr>
	</table>
</form>
</div>

</form>

</body>

</html>

<?php  
include("db_connection.php");
if(isset($_POST['create_job']))  
{  

	$title=$_POST['title'];
	$type=$_POST['type'];
	$desc=$_POST['desc'];

    $insert_user="insert into jobs (title,type,description,eid) VALUES (?,?,?,?)";  
    $stmt = $conn->prepare($insert_user);
	$stmt->bind_param("sssi", $title, $type, $desc, $_SESSION["eid"]);

	if($inserted = $stmt->execute()){
		echo "<script>
		alert('Job created!');
		window.location.href='profile_employer.php'
		</script>";
	}
}
?>