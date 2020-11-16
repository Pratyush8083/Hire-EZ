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

<title>Schedule Election</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">SCHEDULE ELECTION</p></center>
    
    </div>
</nav>

<div align="center" >
<table class="form_tab" style="background-color:white">
  <tr>
    <td>
      <br/>
            <a href="dashboard_admin.php" class="up_btn" style="margin-left:72%;">BACK TO DASHBOARD</a>       
            <a href="logout.php" class="up_btn">LOGOUT</a>
    </td>
</tr>

  <tr>
    
  <td>
    <div class="card">
        <div class="card-body">
          <form action="publish_result.php" method="POST">
            <p class="card-text"><h5>Please select election name to <font style="color:green;">PUBLISH RESULTS</font>:</h5></p>
            <select name="election_name" id="election_name" style="margin-left: 5%; width:90%; font-size: 20px" required>
              <option hidden disabled selected value> -- select an option -- </option>
              <option value="election1">${Election 1}</option>
              <option value="election1">${Election 2}</option>
            </select><br/><br/>
            <input type="submit" name="publish_result" class="btn btn-primary" style="background:green;" value="PUBLISH RESULT">
          </form>
        </div>
    </div>
  </td>
  </tr>
</table>   
</div>

</body>

</html>