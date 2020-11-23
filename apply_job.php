<?php
session_start();
if(!$_SESSION['email'])  
{  
      header("Location: login_jobseeker.php");//redirect to login page to secure the welcome page without login access.  
}
include("db_connection.php");  

$job_id=$_GET['job_id'];  
$status="applied";
$insert_user="insert into job_selection (jid,job_id,status) VALUES (?,?,?)";  
$stmt = $conn->prepare($insert_user);
$stmt->bind_param("iis", $_SESSION['jid'], $job_id, $status);
$inserted = $stmt->execute();

if($inserted)  

{   

    echo "<script>
    alert('You have successfully appplied!');
    window.open('job_search.php','_self')</script>";  

}  
?>