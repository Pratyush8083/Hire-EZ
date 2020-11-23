<?php
session_start();
if(!$_SESSION['email'])  
{  
      header("Location: login_employer.php");//redirect to login page to secure the welcome page without login access.  
}
include("db_connection.php");  

$job_id=$_GET['job_id'];  
$jid=$_GET['jid'];  
echo $jid;
echo $job_id;
$status="accepted";
$insert_user="update job_selection set status= ? where jid = ? and job_id = ?";  
$stmt = $conn->prepare($insert_user);
$stmt->bind_param("sii",$status, $jid, $job_id);
$inserted = $stmt->execute();

if($inserted)  

{   

    echo "<script>
    alert('You have successfully accepted the application!');
    window.open('job_applications.php','_self')</script>";  

}  
?>