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
            <th>Candidate Name</th>  
            <th>Constitution</th>  
            <th>Party Name</th>  
            <th>Qualification</th>  
            <th>Monthly Income</th>  
            <th>Net Worth</th>  
            <th>Criminal Record</th>   
            <th>Approve</th>  
            <th>Reject</th>  
        </tr>  

        </thead>  

  

        <!-- return list of candidates -->
        <!--loop through all the candidates -->  
        <tr>  		
            <td>${cand_name}</td> 
            <td>${constitution}</td>   
            <td>${party_name}</td>
            <td>${qualification}</td>
            <td>${monthly_income}</td>
            <td>${net_worth}</td>
            <td>${criminal_record}</td>         
            <td><a href="approve_candidate.php"><button class="approve_btn">Approve</button></a></td>  
            <td><a href="reject_candidate.php"><button class="del_btn">Reject</button></a></td>  
        </tr>  

        <tr>        
            <td>${cand_name}</td> 
            <td>${constitution}</td>   
            <td>${party_name}</td>
            <td>${qualification}</td>
            <td>${monthly_income}</td>
            <td>${net_worth}</td>
            <td>${criminal_record}</td>         
            <td><a href="approve_candidate.php"><button class="approve_btn">Approve</button></a></td>  
            <td><a href="reject_candidate.php"><button class="del_btn">Reject</button></a></td>  
        </tr>  

        <tr>        
            <td>${cand_name}</td> 
            <td>${constitution}</td>   
            <td>${party_name}</td>
            <td>${qualification}</td>
            <td>${monthly_income}</td>
            <td>${net_worth}</td>
            <td>${criminal_record}</td>         
            <td><a href="approve_candidate.php"><button class="approve_btn">Approve</button></a></td>  
            <td><a href="reject_candidate.php"><button class="del_btn">Reject</button></a></td>  
        </tr>  

        <tr>        
            <td>${cand_name}</td> 
            <td>${constitution}</td>   
            <td>${party_name}</td>
            <td>${qualification}</td>
            <td>${monthly_income}</td>
            <td>${net_worth}</td>
            <td>${criminal_record}</td>         
            <td><a href="approve_candidate.php"><button class="approve_btn">Approve</button></a></td>  
            <td><a href="reject_candidate.php"><button class="del_btn">Reject</button></a></td>  
        </tr>  
    </table>
</div>

</body>

</html>