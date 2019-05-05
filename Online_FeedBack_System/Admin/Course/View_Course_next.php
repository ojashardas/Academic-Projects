<html>
<head>
<title>Course Information</title>
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
  $query = "SELECT * FROM Course_Info where CId =$CId";
  $results = $db->query($query);
  if ($results->num_rows == 1) 
  {
    $row = $results->fetch_assoc();
?>
    <table border="1">
    <tr>
    <td>Course Number</td>
    <td><?php echo "$row[CNo]";?></td>
    </tr>
    <tr>
    <td>Course Name</td>
    <td><?php echo "$row[CName]";?></td>
    </tr>
    <tr>
    <td>Credit</td>
    <td><?php echo "$row[Credit]";?></td>
    </tr>
    <tr>
    <td>Status</td>
    <td><?php echo "$row[Status]";?></td>
    </tr>    
    </table> 
<?php    
  }	
  else
  {
    echo "Course with $Course_Number does not exist.Please enter again";
  }
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>