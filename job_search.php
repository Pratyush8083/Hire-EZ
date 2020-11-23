<?php  
session_start();
if(!$_SESSION['email'])  
{  
      header("Location: login_jobseeker.php");//redirect to login page to secure the welcome page without login access.  
}
include("db_connection.php");
$sql = "select job_id,title,type,description from jobs where job_id NOT IN (Select job_id from job_selection where jid = '".$_SESSION['jid']."')";
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<title>Bob posts</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">JOB POSTS</p></center>
    
    </div>
</nav>

<div align="center">
    <table class="form_tab">
    
    <tr>
        <td>
            <br/><a href="profile_jobseeker.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
    </table>

   

	<table class="form_tab" border=1>  

        <thead>  

        <tr>   
            <th>Job Title</th>  
            <th>Type</th>  
            <th>Description</th>  
            <th></th>  
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
            <td><a href="apply_job.php?job_id=<?php echo $row['job_id'] ?>"><button class="green_btn">APPLY</button></a></td> 
			</tr>
			<?php
			}				
			?>         
    </table>

    <table class="form_tab">  
    <tr><td><br/><br/><b>Search Job Posts</b></td></tr>
        <tr>
            <td>
			<form class="example" action="job_search.php" method="POST">
            <input type="text" id="term" name="term" placeholder="Search Jobs...">
            <button type="submit" name="search_btn"><i class="fa fa-search"></i></button>
            </form>
		    </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>

    <table id="search_table" class="form_tab" border=1 style="display:none">  

    <thead>  

    <tr>   
        <th>Job Title</th>  
        <th>Type</th>  
        <th>Description</th>  
        <th></th>  
    </tr>  

    </thead>  
    
    <?php
    if(isset($_POST['search_btn']))  
    
    {  
    
        $term="%".$_POST['term']."%";   
    
        $sql="select job_id,title,type,description from jobs WHERE (title like ? or description like ? or type like ?) and job_id NOT IN (Select job_id from job_selection where jid = '".$_SESSION['jid']."')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $term, $term, $term);
        $stmt->execute();
        $search_result = $stmt->get_result();
        if ($search_result->num_rows > 0) 
        { ?>
            <script>
                document.getElementById('search_table').style.display = "block";
            </script>
        <?php }
        else{
            ?>
        <script>
                document.write('No results');
            </script>
            <?php
        }
        
        while($row1 = $search_result->fetch_assoc())
        {
        ?>
        <tr>
        <td><?php echo $row1['title'] ?></td> 
        <td><?php echo $row1['type'] ?></td> 
        <td><?php echo $row1['description'] ?></td>          
        <td><a href="apply_job.php?job_id=<?php echo $row1['job_id'] ?>"><button class="green_btn">APPLY</button></a></td> 
        </tr>
        <?php
        }	
    }		
        ?>         
    </table>
</div>
</body>

</html>
