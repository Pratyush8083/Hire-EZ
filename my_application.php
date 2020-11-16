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
            <br/><a href="profile_voter.php" class="up_btn" style="margin-left:85%;">BACK TO PROFILE</a> <br/><br/>
        </td>
    </tr>
</table>

	<table class="form_tab" border=1>  

        <thead>  

        <tr>  
            <th>Company Name</th> 
            <th>Job Post</th>  
            <th></th>   
        </tr>  

        </thead>  
  

        <!-- return list of candidates -->
        <!--loop through all the candidates -->  
        <tr>  		
            <td>${com_name}</td>    
            <td>${job_post}</td>
            <td><button>WITHDRAW</button></td>       
        </tr>  


    </table>
</div>

</body>

</html>