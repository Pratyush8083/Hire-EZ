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
        $( "#dob" ).datepicker({
          dateFormat: 'yy/mm/dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-18",
          clickInput: true,
        });
      });
  </script>

<title>Voter Registration</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>    
  <center><p class="header_text">FORUM</p></center>
</div>
</nav>

<div align="center" id="main_form"> 
  <form>
  <table class="form_tab">
  
  <tr>
    <td>
      <a href="dashboard_field_officer.php" class="up_btn" style="margin-left:70%;">BACK TO DASHBOARD</a>    
      <a href="logout.php" class="up_btn">LOGOUT</a>
    </td>
  </tr>

  <tr>
    <td><hr/><h4>POSTS:</h4></td>
  </tr>

  <tr>
    <td><hr/>
      ${Post_Name}
    </td>
  </tr>
  <tr>
    <td>
      <a href="view_delete_comments.php"><button class="green_btn">View Comments</button></a>
      <a href="delete_post.php"><button class="red_btn">Delete Post</button></a>
    </td>
  </tr>

  <tr>
    <td><hr/>
      ${Post_Name}
    </td>
  </tr>
  <tr>
    <td>
      <a href="view_comments.php"><button class="green_btn">View Comments</button></a>
    
      <a href="delete_post.php"><button class="red_btn">Delete Post</button></a>
    </td>
  </tr>

  <tr>
    <td><hr/>
      ${Post_Name}
    </td>
  </tr>
  <tr>
    <td>
      <a href="view_comments.php"><button class="green_btn">View Comments</button></a>
    
      <a href="delete_post.php"><button class="red_btn">Delete Post</button></a>
    </td>
  </tr>
  
  </table>
  </form>
</div>

</body>
</html>
