<html>
<head>
<title>Instructor Information</title>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Instructor/Instructors.php">Return to Instructor Page</a>
<br/>
<br/>
<?php
$Instr_SSN = $_POST["Instr_SSNtextbox"];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Instructor_Info where Inst_SSN ='$Instr_SSN'";
  $results = $db->query($query);
  if ($results->num_rows == 1) 
  {
    $row = $results->fetch_assoc();
?>
    <table border="1">
    <tr>
    <td>Instructor SSN</td>
    <td><?php echo "$row[Inst_SSN]";?></td>
    </tr>
    <tr>
    <td>Instructor Name</td>
    <td><?php echo "$row[Inst_Name]";?></td>
    </tr>
    <tr>
    <td>Instructor NetID</td>
    <td><?php echo "$row[Inst_NetID]";?></td>
    </tr>
    <tr>
    <td>Instructor Office</td>
    <td><?php echo "$row[Inst_Office]";?></td>
    </tr>
    </table> 
<?php    
  }	
  else
  {
    echo "Instructor with $Instr_SSN does not exist.Please enter again";
  }
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>