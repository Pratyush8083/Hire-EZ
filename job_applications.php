<?php  
session_start();
if(!$_SESSION['email'])  
{  
      header("Location: login_employer.php");//redirect to login page to secure the welcome page without login access.  
}
include("db_connection.php");
$sql = "select status,jobs.title as jtitle,job_selection.jid,job_selection.job_id,job_seeker.name,qd.title as qtitle,qd.marks_ob,qd.file from jobs,job_selection,job_seeker,qualification_documents qd where jobs.eid='".$_SESSION['eid']."' and jobs.job_id=job_selection.job_id and job_selection.jid=job_seeker.jid and job_seeker.jid=qd.jid";
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
            <br/><a href="profile_employer.php" class="up_btn" style="margin-left:80%;">BACK TO DASHBOARD</a> <br/><br/>
        </td>
    </tr>
    </table>

	<table class="form_tab" border=1>  

        <thead>  

        <tr>  
            <th>JobSeeker Name</th>  
            <th>Job Title</th>  
            <th>Qualification</th> 
            <th>Marks Obtained</th>  
            <th>Document</th>    
            <th>Application Status</th>
            <th colspan=2>Action</th>  
        </tr>  

        </thead>  
        <?php
			while($row = $result->fetch_assoc())
			{
			?>
			<tr>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['jtitle'] ?></td> 
            <td><?php echo $row['qtitle'] ?></td>      
            <td><?php echo $row['marks_ob'] ?></td> 
            <td><img src="<?php echo "uploads/".$row['file'] ?>" alt="Qualification Doc" width="120" height="120" style="float:right"></td>   
            <td><?php echo $row['status'] ?></td>    
            <td><a href="accept_application.php?job_id=<?php echo $row['job_id'] ?>&jid=<?php echo $row['jid'] ?>"><button class="green_btn">ACCEPT</button></a></td>
            <td><a href="reject_application.php?job_id=<?php echo $row['job_id'] ?>&jid=<?php echo $row['jid'] ?>"><button class="red_btn">REJECT</button></a></td>
			</tr>
			<?php
			}				
			?>  
        
    </table>

    <table class="form_tab">  
    <tr><td><br/><br/><b>Search Candidates</b></td></tr>
        <tr>
            <td>
			<form class="example" action="job_applications.php" method="POST">
            <input type="text" id="term" name="term" placeholder="Search candidates by qualification and marks obtained...">
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
            <th>JobSeeker Name</th>  
            <th>Job Title</th>  
            <th>Qualification</th> 
            <th>Marks Obtained</th>  
            <th>Document</th>    
            <th>Application Status</th>
            <th colspan=2>Action</th>  
        </tr>  

    </thead>  
    
    <?php
    if(isset($_POST['search_btn']))  
    
    {  
    
        $term=$_POST['term']; 
        $t = "%".$term."%";
        $m = (float)$term;
        if($m == 0){
            $m = 101;
        }
        $sql1="select status,jobs.title as jtitle,job_selection.jid,job_selection.job_id,job_seeker.name,qd.title as qtitle,qd.marks_ob,qd.file from jobs,job_selection,job_seeker,qualification_documents qd where (qd.title like ? or qd.marks_ob > ?) and jobs.eid='".$_SESSION['eid']."' and jobs.job_id=job_selection.job_id and job_selection.jid=job_seeker.jid and job_seeker.jid=qd.jid";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sd", $t, $m);
        $stmt1->execute();
        $search_result = $stmt1->get_result();
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
            <td><?php echo $row1['name'] ?></td> 
            <td><?php echo $row1['jtitle'] ?></td> 
            <td><?php echo $row1['qtitle'] ?></td>      
            <td><?php echo $row1['marks_ob'] ?></td>
            <td><img src="<?php echo "uploads/".$row1['file'] ?>" alt="Qualification Doc" width="120" height="120" style="float:right"></td>   
            <td><?php echo $row1['status'] ?></td>    
            <td><a href="accept_application.php?job_id=<?php echo $row1['job_id'] ?>&jid=<?php echo $row1['jid'] ?>"><button class="green_btn">ACCEPT</button></a></td>
            <td><a href="reject_application.php?job_id=<?php echo $row1['job_id'] ?>&jid=<?php echo $row1['jid'] ?>"><button class="red_btn">REJECT</button></a></td>
			</tr>
			<?php
			}	
    }		
        ?>         
    </table>
</div>

</body>

</html>