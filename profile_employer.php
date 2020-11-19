<?php
session_start();  
if(!$_SESSION['email'])  
{  
      header("Location: login_employer.php");//redirect to login page to secure the welcome page without login access.  
}

include("db_connection.php");  

  $sql = "select eid,name,email,description,address,employer_type from employer WHERE email = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $_SESSION['email']);
	$stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $_SESSION["eid"] = $row['eid'];
?> 

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/profile.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <title>Profile</title>
</head>

<body>
  <div class="page">
    <header tabindex="0">WELCOME <?php echo $row['name'];?></header>
    <div id="nav-container">
      <div class="bg"></div>
      <div class="button" tabindex="0"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
      <div id="nav-content" tabindex="0">
        <ul>
          <li><a href="my_jobs.php">My Job Posts</a></li>
          <li><a href="jobs.php" style="color:green;">Create Job Post</a></li>
          <li><a href="job_applications.php">View Applicants</a></li>
          <li><a href="logout.php" style="color:red;">LOGOUT</a></li>
        </ul>
      </div>
      <div class="cardDivision col-7">
        <div class="card col-6">
          <br> <img class="card-img-top" src="https://picsum.photos/200/150/?random">
          <br>
          <div class="card-block">
            <div class="card-text">
              <p>Email : <?php echo $row['email'];?></p>
              <p>Description : <?php echo $row['description'];?></p>
              <p>Employer Type : <?php echo $row['employer_type'];?></p>
              <p>Address : <?php echo $row['address'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>