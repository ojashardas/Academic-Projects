<html>
<head>
<title>Add Course</title>
</head>
<body>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<br/>
<?php
$Course_No = $_POST["Course_Notextbox"];
$Course_Name = $_POST["Course_Nametextbox"];
$Course_Credit = $_POST["Course_Credittextbox"];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Course_Info where CNo ='$Course_No' and Status ='ACTIVE'";
  $results = $db->query($query);
  $query1 = "SELECT * FROM Course_Info where CNo ='$Course_No' and Status ='DELETED'";
  $results1 = $db->query($query1);
  
  
  if ($results->num_rows == 1) 
  {
    echo "Course with $Course_No already exists.Please check again.";
  }
  else if($results1->num_rows == 1)
  {
    $row = $results1->fetch_assoc();
    $query = "UPDATE Course_Info set Cname ='$Course_Name',Credit='$Course_Credit',Status='ACTIVE' where CId=$row[CId]";
    $result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error inserting the item.';
  		exit;
  	}
    else
    {
      echo "Course added successfully.";
    }
  }
  else
  {
    $query = "INSERT INTO Course_Info VALUES (NULL,'$Course_No','$Course_Name','$Course_Credit','ACTIVE')";    
   	$result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error inserting the item.';
  		exit;
  	}
    else
    {
      echo "Course added successfully.";
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