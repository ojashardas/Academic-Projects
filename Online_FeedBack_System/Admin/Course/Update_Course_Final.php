<html>
<head>
<title>Updated Course</title>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<br/>
<?php
session_start();
$Course_Name = $_POST["Course_Nametextbox"];
$Course_Credit = $_POST["Course_Credittextbox"];
$Cid = $_SESSION['Cid'];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}  
    
  $query = "UPDATE Course_Info SET CName='$Course_Name',Credit='$Course_Credit' WHERE CId =$Cid";    
 	$result = $db->query($query);
    	
 	if ($db->affected_rows != 1) 
  {
		echo 'There was an error updating the item.';
		exit;
	}
  else
  {
    echo "Course updated successfully.";
  }
  
  
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>