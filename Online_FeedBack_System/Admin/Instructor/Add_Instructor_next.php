<html>
<head>
<title>Add Instructor</title>
</head>
<body>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Instructor/Instructors.php">Return to Instructor Page</a>
<br/>
<br/>
<?php
$Instr_SSN = $_POST["Instr_SSNtextbox"];
$Instr_Name = $_POST["Instr_Nametextbox"];
$Instr_Office = $_POST["Instr_Officetextbox"];
$Instr_NetID = $_POST["Instr_NetIDtextbox"];
$Instr_Password = $_POST["Instr_Passwordtextbox"];
$new_pwd = sha1($Instr_Password);

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Instructor_Info where Inst_SSN ='$Instr_SSN'";
  $results = $db->query($query);
  $query1 = "SELECT * FROM Instructor_Info where Inst_NetID ='$Instr_NetID'";
  $results1 = $db->query($query1);
  if ($results->num_rows == 1) 
  {
    echo "Instructor with $Instr_SSN already exists.Please check again.";
  }
  else if ($results1->num_rows == 1) 
  {
    echo "Instructor with $Instr_NetID already exists.Please assign different NetID.";
  }
  else
  {
    $query = "INSERT INTO Instructor_Info VALUES ('$Instr_SSN','$Instr_Name','$Instr_Office','$Instr_NetID','$new_pwd')";    
   	$result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error inserting the item.';
  		exit;
  	}
    else
    {
      echo "Instructor added successfully.";
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