<?php
session_start();  
if(!$_SESSION['email'])  
{  
      header("Location: login_jobseeker.php");//redirect to login page to secure the welcome page without login access.  
}

include("db_connection.php");  

 	$jid = $_SESSION['jid'];

	$sql = "select title, marks_ob, file from qualification_documents WHERE jid = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $jid);
	$stmt->execute();
  	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	if ($result->num_rows == 0)  {
		$title = "";
		$marks_ob = "";
	} else {	
		$title = $row['title'];	
		$marks_ob = $row['marks_ob'];
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
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

    <script>
	$(function() {  
        $( "#curr_start" ).datepicker({
          dateFormat: 'yy/mm/dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-0",
          clickInput: true,
        });
		$( "#prev_start" ).datepicker({
          dateFormat: 'yy/mm/dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-0",
          clickInput: true,
        });
		$( "#prev_end" ).datepicker({
          dateFormat: 'yy/mm/dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-0",
          clickInput: true,
        });
	  });
	  
	  function show_prof()
		{
			document.getElementById('prof_div').style.display="block";
			document.getElementById('free_div').style.display="none";
		}

		function show_free()
		{
			document.getElementById('free_div').style.display="block";
			document.getElementById('prof_div').style.display="none";
		}
	</script>

<title>Manage Qualification</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>    
	<center><p class="header_text">Manage Qualification</p></center>
</div>
</nav>

<div align="center" id="main_form">	
	<form action="manage_jobseeker_qualification.php" method="POST" enctype="multipart/form-data">
	<table class="form_tab">
	
	<tr>
		<td colspan=2>
			<a href="profile_jobseeker.php" class="up_btn" style="margin-left:77%;">BACK TO PROFILE</a>	
		</td>
	</tr>

	<tr>
		<td colspan=2><hr/><h4>My Qualifications:</h4></td>
	</tr>

	<tr>
		<td colspan=2>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="qual" id="qual" class="inputText" value="<?php echo $title ?>"/>
		<span class="floating-label">Highest qualification</span><br/></div>
		</td>
	</tr>

	<tr>
		<td colspan=2>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="perc" id="perc" class="inputText" value="<?php echo $marks_ob ?>"autocomplete="off"/>
		<span class="floating-label">Percentage Obtained</span><br/></div>
		</td>
	</tr>
		
	<tr>
		<td>
		<img src="<?php echo "uploads/".$row['file'] ?>" alt="Qualification Doc" width="120" height="120" style="float:right">
		</td>
		<td>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-picture-o" style="font-size:20px;"></></i>
		<div style="background:skyblue;width:300px;padding:10px;margin-left: 10%;">
			<input type="file" name="file" accept="image/*" capture="camera"/>
		</div>
		<span class="floating-label">Upload certificate (image only)</span><br/>
		<p id="msg" style="font-size:14px;color:red;margin-left:10%;"></p>
		</div>
		</td>
    </tr>
    <tr>
        <td></td>
		<td><br/><button type="submit" class="up_btn" name="upload_btn" onclick="show_spin()"><p id="spin" style="display:none;">

		<i class="fa fa-spinner fa-spin" style="font-size:18px;font-color:red"></i></p> Upload & Submit</button></td>
	</tr>

	
	<tr>
	</table>
    </form>
</div>
</body>
</html>
<?php
		if(isset($_POST['upload_btn']))

		{
			$title = $_POST['qual'];
			$marks_ob = $_POST['perc'];
			$fileName = $_FILES['file']['name'];		
			$fileTmpName = $_FILES['file']['tmp_name'];		
			$fileExt = explode('.', $fileName);		
			$fileActualExt = strtolower(end($fileExt));		
			$allowed = array('jpg','jpeg','png');		
			if(in_array($fileActualExt, $allowed))		
			{			
				$fileNameNew = uniqid('',true).".".$fileActualExt;
		
				$fileDestination = 'uploads/'.$fileNameNew;
			}
			include("db_connection.php");

			$image = $fileNameNew;
			$email = $_SESSION["email"];

			if ($result->num_rows > 0)  {
				$sql = "update qualification_documents set title =?, marks_ob= ?, file = ? WHERE jid = ?";
			} else {	
				$sql = "insert into qualification_documents (title,marks_ob,file, jid) VALUES (?,?,?,?)";
			}		
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sdsi",  $title, $marks_ob, $image, $jid);
			$stmt->execute();
			move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination);

			echo "<script>window.location.href='manage_jobseeker_qualification.php'</script>";
		}
	?>