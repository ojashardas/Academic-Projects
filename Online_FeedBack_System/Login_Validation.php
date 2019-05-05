<?php
session_start();
$netid = $_POST["netidtextbox"]; 
$pwd = $_POST["passwordtextbox"]; 

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  
  $new_pwd = sha1($pwd);
  $new_netid = addslashes($netid);
  
  $query = "SELECT * FROM Dept_Admin where Username = '$new_netid' and Password = '$new_pwd' ";
  $results = $db->query($query);
  if ($results->num_rows == 1) 
  {
    header('Location:http://localhost/project/Admin/Admin.php');
  }	
  else
  {
    $query = "SELECT Inst_SSN FROM Instructor_Info where Inst_NetID = '$new_netid' and Inst_Password = '$new_pwd' ";
  	$results = $db->query($query);  	
  	if ($results->num_rows == 1) 
    {
  		$row = $results->fetch_object();		
  		$_SESSION['Inst_SSN'] = $row->Inst_SSN;
      header('Location:http://localhost/project/Instructor_Courses.php');		
  	}	
  	else 
    {		
      header('Location:http://localhost/project/Login_failed.php');
  	}
  }
  
	$closed = $db->close();
	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>