<html>
<head>
<title>All Course Information</title>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<br/>
<?php
@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Course_Info";
  $results = $db->query($query);
  if ($results->num_rows > 0) 
  {
?>
    <table border="1" align="Center">
    <tr>
     <td>Course Number</td>
     <td>Course Name</td>
     <td>Credit</td>
     <td>Status</td>
    </tr>
<?php
      while($row = $results->fetch_assoc())
      {
?>
        <tr>    
          <td><?php echo "$row[CNo]";?></td>    
          <td><?php echo "$row[CName]";?></td>    
          <td><?php echo "$row[Credit]";?></td>
          <td><?php echo "$row[Status]";?></td>
        </tr>
<?php
      }
?>    
    </table> 
<?php    
  }	
  else
  {
    echo "No Courses exist.";
  }
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>