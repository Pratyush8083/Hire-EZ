<?php
session_start();  
if(!$_SESSION['email'])  
{  
      header("Location: login_jobseeker.php");//redirect to login page to secure the welcome page without login access.  
}

include("db_connection.php");  

	$jid = $_SESSION['jid'];
	$sql = "select profession_type from job_seeker WHERE jid = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $jid);
	$stmt->execute();
  	$result = $stmt->get_result();
	$job_seeker = $result->fetch_assoc();

	$p_type=$job_seeker['profession_type'];	

	$sql1 = "select pcid, work_description, start_date, end_date from worked_for WHERE jid = ?";
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bind_param("i", $jid);
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
	$stmt2->bind_param("i", $jid);
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
	$stmt3->bind_param("i", $pcid);
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

	$sql4 = "select experience from freelancer WHERE jid = ?";
	$stmt4 = $conn->prepare($sql4);
	$stmt4->bind_param("i", $jid);
	$stmt4->execute();
  	$result4 = $stmt4->get_result();
	$freelancer = $result4->fetch_assoc();

	if ($result4->num_rows == 0)  {
		$exp = "";
	} else {	
		$exp = $freelancer['experience'];
	}

	$sql5 = "select name,description,reference_link from projects p,project_references pr WHERE p.pid=pr.pid and p.jid = ?";
	$stmt5 = $conn->prepare($sql5);
	$stmt5->bind_param("i", $jid);
	$stmt5->execute();
  	$result5 = $stmt5->get_result();


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

<title>MANAGE WORK EXPERIENCE</title>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>    
	<center><p class="header_text">Manage Work Experience</p></center>
</div>
</nav>


<div align="center" id="prof_div" style="display:none">
	<form action="manage_jobseeker_exp.php" method="POST">
	<table class="form_tab">
	<tr>
		<td colspan=2>
			<a href="profile_jobseeker.php" class="up_btn" style="margin-left:77%;">BACK TO PROFILE</a>	
		</td>
	</tr>
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

	<tr>
		<td colspan=3><br/>
		<button type="submit" class="btn" name="save_prof" id="save_prof" onclick="show_spin()"><p id="spin" style="display:none;">
		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> Save Details</button>
		</td>
	</tr>
	<!-- <tr>
		<td colspan=3>
			<a href="profile_voter.php" class="up_btn" style="margin-left:77%;">Add</a>
		</td>
	</tr> -->
	</table>
	</form>
	</div>

<div align="center" id="free_div" style="display:none">
<table class="form_tab">
	<tr>
		<td colspan=2>
			<a href="profile_jobseeker.php" class="up_btn" style="margin-left:77%;">BACK TO PROFILE</a>	
		</td>
	</tr>
</table>
	<table class="form_tab" border=1> 
        <thead>  

        <tr>   
            <th>Project Name</th>  
            <th>Description</th>  
            <th>Reference Link</th>  
        </tr>  

        </thead>  
        <?php
			while($row = $result5->fetch_assoc())
			{
			?>
			<tr>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td>          
            <td><?php echo $row['reference_link'] ?></td> 
			</tr>
			<?php
			}				
			?>         
    </table>
	<form action="manage_jobseeker_exp.php" method="POST">
	<table class="form_tab">

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="exp" id="exp" value="<?php echo $exp; ?>" class="inputText"/>
		<span class="floating-label">Freelancing Experience (in years)</span><br/></div>
		</td>
	</tr>	
	
	<tr>
	<td><h5>Add Past Project Details</h5></td>
	</tr>
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-calendar" style="font-size:20px;"></i>
		<input type="text" name="p_name" id="p_name" class="inputText"/>
		<span class="floating-label">Project Name</span><br/>
		</div>
		</td>
	</tr>
	
	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="p_desc" id="p_desc" class="inputText"/>
		<span class="floating-label">Description</span><br/></div>
		</td>
	</tr>

	<tr>
		<td colspan=3>
		<div class="user-input-wrp"><br/>
		<i class="fa fa-money" style="font-size:20px;"></i>
		<input type="text" name="p_ref_link" id="p_ref_link" class="inputText"/>
		<span class="floating-label">Reference Link</span><br/></div>
		</td>
	</tr>

	<tr>
		<td colspan=3><br/>
		<button type="submit" class="btn" name="save_free" id="save_free" onclick="show_spin()"><p id="spin" style="display:none;">
		<i class="fa fa-spinner fa-spin" style="font-size:22px"></i></p> Save Details</button>
		</td>
	</tr>
	</table>
	</form>
</div>
	
<?php
if($p_type === "professional"){
	echo "<script>show_prof();</script>";
}
else if($p_type === "freelancer"){
	echo "<script>show_free();</script>";
}
else{
	echo "You cannot add your work experience as you are a fresher!";
}
?>
</body>
</html>

<?php  
if(isset($_POST['save_prof'])) 
{  
    $current_company=$_POST['curr_company_name'];
	$current_company_start_date=$_POST['curr_start'];	
	$sql="select * from professional WHERE jid=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $jid);
	$stmt->execute();
	$res = $stmt->get_result();
	if ($res->num_rows == 0)  {
		$sql="insert into professional (jid,current_company,current_company_start_date) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iss", $jid, $current_company, $current_company_start_date);
		$stmt->execute();
	}	

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
	$sql="select pcid from prev_companies WHERE name=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $name);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$pcid = $row['pcid'];

	$work_description=$_POST['work_desc'];  
	$start_date=$_POST['prev_start'];  
	$end_date=$_POST['prev_end'];	
	$sql = "insert into worked_for (work_description,start_date,end_date,jid,pcid) VALUES (?,?,?,?,?)";	
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssii",  $work_description, $start_date, $end_date, $jid, $pcid);
	$stmt->execute();

	echo "<script>window.location.href='manage_jobseeker_exp.php'</script>";
}

if(isset($_POST['save_free'])) 
{  

	$exp = $_POST['exp'];
	$sql="select * from freelancer WHERE jid=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $jid);
	$stmt->execute();
	$res = $stmt->get_result();
	if ($res->num_rows == 0)  {
		$sql="insert into freelancer (jid, experience) VALUES (?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ii", $jid, $exp);
		$stmt->execute();
	}

	$p_name=$_POST['p_name'];
	$p_desc=$_POST['p_desc'];	
	$sql="insert into projects (name,description,jid) VALUES (?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssi", $p_name, $p_desc, $jid);
	$stmt->execute();

	$sql="select pid from projects WHERE name=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $p_name);
	$stmt->execute();
	$res = $stmt->get_result();
	$projects = $res->fetch_assoc();

	
	$pid = $projects['pid'];
	$p_ref_link=$_POST['p_ref_link'];
	$res = $stmt->get_result();
	$sql="insert into project_references (pid, reference_link) VALUES (?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("is", $pid, $p_ref_link);
	$stmt->execute();
	echo "<script>window.location.href='manage_jobseeker_exp.php'</script>";
}
?>  

