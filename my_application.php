<?php  
session_start();
if(!$_SESSION['email'])  
{  
      header("Location: login_jobseeker.php");//redirect to login page to secure the welcome page without login access.  
}
include("db_connection.php");
$sql = "select jobs.job_id,jobs.title,employer.name,jobs.description, job_selection.status from jobs, job_selection, employer where job_selection.job_id=jobs.job_id and jobs.eid=employer.eid and job_selection.jid='".$_SESSION['jid']."'";
$result=$conn->query($sql);  
?>
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

   

<title>My Applications</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">My Job Applications</p></center>
    
    </div>
</nav>

<div align="center">
    <table class="form_tab">
    
    <tr>
        <td>
            <br/><a href="profile_jobseeker.php" class="up_btn" style="margin-left:85%;">BACK TO PROFILE</a> <br/><br/>
        </td>
    </tr>
</table>

	<table class="form_tab" border=1>  

        <thead>  

        <tr>  
            <th>Company Name</th> 
            <th>Job Post</th> 
            <th>Job Description</th>  
            <th>Application Status</th>
            <th>Action</th>   
        </tr>  

        </thead>  
  

        <!-- return list of candidates -->
        <!--loop through all the candidates -->  
        <?php
			while($row = $result->fetch_assoc())
			{
			?>
			<tr>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['title'] ?></td> 
            <td><?php echo $row['description'] ?></td>     
            <td><?php echo $row['status'] ?></td>      
            <td><a href="withdraw_job.php?job_id=<?php echo $row['job_id'] ?>&jid=<?php echo $_SESSION['jid'] ?>"><button class="red_btn">WITHDRAW</button></a></td> 
			</tr>
			<?php
			}				
		?>  


    </table>
</div>

</body>

</html>