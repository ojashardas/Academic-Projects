<html>
<head>
<title>Course Deletion</title>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<br/>
<?php
$CId = $_POST["course_name"];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "Update Course_Info set Status ='DELETED' where CId =$CId";
  $results = $db->query($query);
  if ($db->affected_rows == 1) 
  { 
    echo "Course has been deleted successfully";   
  }	
  else
  {
    echo "Course cannot be deleted. Please try again.";
  }
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>