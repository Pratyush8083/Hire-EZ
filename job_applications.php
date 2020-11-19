<?php  

ob_start();

include("db_connection.php");

$sql = "select * from candidate";
$run = $conn->query($sql);


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

   

<title>MANAGE CANDIDATES</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">MANAGE CANDIDATES</p></center>
    
    </div>
</nav>

<div align="center">
<tr>
        <td>
            <br/><a href="profile_employer.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
    <table class="form_tab">
    
    <tr>
        <td>
            <br/><a href="dashboard_field_officer.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
    </table>

	<table class="form_tab" border=1>  

        <thead>  

        <tr>  
            <th>JobSeeker Name</th>  
            <th>Job Title</th>  
            <th>Email</th>  
            <th>Qualification</th> 
            <th>Marks Obtained</th>  
            <th>Document</th>    
            <th>Schedule Interview</th>  
            <th>Reject</th>  
        </tr>  

        </thead>  

  

        <!-- return list of candidates -->
        <!--loop through all the candidates -->  
        <?php

				$i=1;
				while($row = $run->fetch_assoc())
				{
			?>
			<tr>

				<td><input type="radio" name="candidate" value="<?php echo $i; ?>" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<?php
						echo "<p><strong>".$row['cand_name']."</strong><br/>".$row['course']."</p>";
					?>
				</td>

			</tr>
			<tr><td><hr/></td><td><hr/></td><td><hr/></td></tr>
			<?php
				$i++;
				}
				
			?> 

        
    </table>
</div>

</body>

</html>