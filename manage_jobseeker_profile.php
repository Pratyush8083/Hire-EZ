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

	$sql1 = "select pcid, work_description, start_date, end_date from worked_for WHERE jid = ?";
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bind_param("s", $jid);
	$stmt1->execute();
  	$result1 = $stmt1->get_result();
	$worked_for = $result1->fetch_assoc();

	if ($result1->num_rows == 0)  {
		$pcid = "";
		$work_description = "";
		$start_date = "";
		$end_date = "";
	} else {	
		$pcid = $worked_for['pcid'];	
		$work_description = $worked_for['work_description'];
		$start_date = $worked_for['start_date'];	
		$end_date = $worked_for['end_date'];
	}

	$sql2 = "select current_company, current_company_start_date from professional WHERE jid = ?";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bind_param("s", $jid);
	$stmt2->execute();
  	$result2 = $stmt2->get_result();
	$professional = $result2->fetch_assoc();

	if ($result2->num_rows == 0)  {
		$current_company = "";
		$current_company_start_date = "";
	} else {	
		$current_company = $professional['current_company'];	
		$current_company_start_date = $professional['current_company_start_date'];
	}

	$sql3 = "select name, type, reg_no from prev_companies WHERE pcid = ?";
	$stmt3 = $conn->prepare($sql3);
	$stmt3->bind_param("s", $pcid);
	$stmt3->execute();
  	$result3 = $stmt3->get_result();
	$prev_companies = $result3->fetch_assoc();

	if ($result3->num_rows == 0)  {
		$name = "";
		$type = "";
		$reg_no = "";
	} else {	
		$name = $prev_companies['name'];	
		$type = $prev_companies['type'];
		$reg_no = $prev_companies['reg_no'];
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

<title>MANAGE PROFILE</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>    
	<center><p class="header_text">MANAGE PROFILE</p></center>
</div>
</nav>

<div align="center" id="main_form">	
	<form action="manage_jobseeker_profile.php" method="POST" enctype="multipart/form-data">
	<table class="form_tab">
	
	<tr>
		<td colspan=3>
			<a href="profile_jobseeker.php" class="up_btn" style="margin-left:77%;">BACK TO PROFILE</a>	
		</td>
	</tr>

	<tr>
		<td colspan=3><hr/><h4>My Qualifications:</h4></td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="qual" id="qual" class="inputText" value="<?php echo $title ?>"/>
		<span class="floating-label">Highest qualification</span><br/></div>
		</td>
	</tr>

	<tr>
		<td colspan=3>
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

		<td><br/><button type="submit" class="up_btn" name="upload_btn" onclick="show_spin()"><p id="spin" style="display:none;">

		<i class="fa fa-spinner fa-spin" style="font-size:18px;font-color:red"></i></p> UPLOAD</button></td>
	</tr>


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

			echo "<script>window.location.href='manage_jobseeker_profile.php'</script>";
		}
	?>
	
	<tr>
	</table>
	</form>


	<table class="form_tab">
	<td><h4>Profession Type</h4></td>
		<td><input type="radio" name="p_type" value="company" onchange="show_prof()">&nbsp Professional</td>
		<td><input type="radio" name="p_type" value="individual" onchange="show_free()">&nbsp Freelancer</td>
	</tr>
	</table>
</div>

<div align="center" id="prof_div" style="display:none">
	<form action="manage_jobseeker_profile.php" method="POST">
	<table class="form_tab">
	<tr>
		<td colspan=3><hr/><h5>Current Company</h5></td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="curr_company_name" id="curr_company_name" value="<?php echo $current_company; ?>" class="inputText"/>
		<span class="floating-label">Current Company Name</span><br/></div>
		</td>
	</tr>	
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-calendar" style="font-size:20px;"></i>
		<input type="text" name="curr_start" id="curr_start" value="<?php echo $current_company_start_date; ?>" class="inputText"/>
		<span class="floating-label">Start Date</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=3><hr/><h5>Previous Company</h5></td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="prev_company_name" id="prev_company_name" value="<?php echo $name; ?>" class="inputText"/>
		<span class="floating-label">Company Name</span><br/></div>
		</td>
	</tr>
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="company_type" id="company_type" value="<?php echo $type; ?>" class="inputText"/>
		<span class="floating-label">Company Type</span><br/></div>
		</td>
	</tr>	
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="reg_no" id="reg_no" value="<?php echo $reg_no; ?>" class="inputText"/>
		<span class="floating-label">Company Registration No.</span><br/></div>
		</td>
	</tr>	

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="work_desc" id="work_desc" value="<?php echo $work_description; ?>" class="inputText"/>
		<span class="floating-label">Work Description</span><br/></div>
		</td>
	</tr>	

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-calendar" style="font-size:20px;"></i>
		<input type="text" name="prev_start" id="prev_start" value="<?php echo $start_date; ?>" class="inputText"/>
		<span class="floating-label">Start Date</span><br/>
		</div>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-calendar" style="font-size:20px;"></i>
		<input type="text" name="prev_end" id="prev_end" value="<?php echo $end_date; ?>" class="inputText"/>
		<span class="floating-label">End Date</span><br/>
		</div>
		</td>
	</tr>

	<!-- <tr>
		<td colspan=3>
			<a href="profile_voter.php" class="up_btn" style="margin-left:77%;">Add</a>
		</td>
	</tr> -->
	</table>
	</div>	
</div>

<div align="center" id="free_div" style="display:none">
	<table class="form_tab">
	<tr>
		<td colspan=3><hr/><h4>My Experiences:</h4></td>
	</tr>
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="exp" id="exp" class="inputText" value=""/>
		<span class="floating-label">Experience (in years)</span><br/></div>
		</td>
	</tr>
	</table>
</div>
<div align="center" id="main_form">
	<table class="form_tab">

	<tr>
		<td colspan=3><br/>
		<button type="submit" class="btn" name="save_btn" id="save_btn" onclick="show_spin()"><p id="spin" style="display:none;">
		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> SAVE PROFILE</button>
		</td>
	</tr>
	
	</table>
	</form>
</div>

</body>
</html>

<?php  
if(isset($_POST['save_btn'])) 
{  
    $current_company=$_POST['curr_company_name'];
	$current_company_start_date=$_POST['curr_start'];	
	$sql="insert into professional (jid,current_company,current_company_start_date) VALUES (?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("iss", $jid, $current_company, $current_company_start_date);
	$stmt->execute();

	$name=$_POST['prev_company_name'];
	$type=$_POST['company_type'];  
	$reg_no=$_POST['reg_no']; 
	$sql="select pcid from prev_companies WHERE name=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $name);
	$stmt->execute();
	$res = $stmt->get_result();
 
	if ($res->num_rows == 0)  {
		$sql = "insert into prev_companies (name,type,reg_no) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi",  $name, $type, $reg_no);
		$stmt->execute();
	}	
	$row = $res->fetch_assoc();
	$pcid = $row['pcid'];

	$work_description=$_POST['work_desc'];  
	$start_date=$_POST['prev_start'];  
	$end_date=$_POST['prev_end'];
	if ($result1->num_rows > 0)  {
		$sql = "update worked_for set work_description =?, start_date= ?, end_date = ?, jid=? WHERE pcid = ?";
	} else {	
		$sql = "insert into worked_for (work_description,start_date,end_date,jid,pcid) VALUES (?,?,?,?,?)";
	}		
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssii",  $work_description, $start_date, $end_date, $jid, $pcid);
	$stmt->execute();

	echo "<script>window.location.href='manage_jobseeker_profile.php'</script>";
}
?>  

