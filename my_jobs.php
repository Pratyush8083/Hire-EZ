<?php  

session_start();
include("db_connection.php");

$sql = "select job_id,title,type,description from jobs where eid=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["eid"]);
$stmt->execute();
$result = $stmt->get_result();

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<title>My job posts</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">MY JOB POSTS</p></center>
    
    </div>
</nav>

<div align="center">
    <table class="form_tab">
    
    <tr>
        <td>
            <br/><a href="profile_employer.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
    </table>

	<table class="form_tab" border=1>  

        <thead>  

        <tr>   
            <th>Job Title</th>  
            <th>Type</th>  
            <th>Description</th>  
            <th>Delete</th>  
        </tr>  

        </thead>  
        <?php
			while($row = $result->fetch_assoc())
			{
			?>
			<tr>
            <td><?php echo $row['title'] ?></td> 
            <td><?php echo $row['type'] ?></td> 
            <td><?php echo $row['description'] ?></td>          
            <td><a href="delete_jobs.php?del=<?php echo $row['job_id'] ?>"><button class="del_btn">Delete</button></a></td> 
			</tr>
			<?php
			}				
			?>         
    </table>
</div>
</body>

</html>