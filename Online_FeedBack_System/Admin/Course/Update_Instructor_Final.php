<html>
<head>
<title>Updated Instructor</title>
</head>
<body>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Instructor/Instructors.php">Return to Instructor Page</a>
<br/>
<br/>
<?php
$Instr_SSN = $_POST["Inst_SSNtextbox"];
$Instr_Name = $_POST["Inst_Nametextbox"];
$Instr_Office = $_POST["Inst_Officetextbox"];
$Instr_Password = $_POST["Inst_Passwordtextbox1"];
$new_pwd = sha1($Instr_Password);

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}  
  if($Instr_Password == '')
  {
    
    $query = "UPDATE Instructor_Info SET Inst_Name='$Instr_Name',Inst_Office='$Instr_Office' WHERE Inst_SSN ='$Instr_SSN' ";    
   	$result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error updating the item.';
  		exit;
  	}
    else
    {
      echo "Instructor updated successfully.";
    }
  }
  else
  {
    
    $new_pwd = sha1($Instr_Password);
    $query = "UPDATE Instructor_Info SET Inst_Name='$Instr_Name',Inst_Office='$Instr_Office',Inst_Password='$new_pwd' WHERE Inst_SSN ='$Instr_SSN' ";    
   	$result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error updating the item.';
  		exit;
  	}
    else
    {
      echo "Instructor updated successfully.";
    }
  }    
  
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>