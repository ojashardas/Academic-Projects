<html>
<head>
<title>Course Schedule creation</title>
</head>
<body>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course_Schedule/Course_Schedule.php">Return to Course-Schedule Page</a>
<br/>
<br/>
<?php
$CId = $_POST["course_name"];
$SecNo = $_POST["secno"];
$Semester = $_POST["semester"];
$Year = $_POST["semester_year"];
$Semester_year = $Semester . " " . $Year; 
$Inst_SSN = $_POST["instructor_name"];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Course_Schedule where CId ='$CId' and SecNo='$SecNo' and SemYear ='$Semester_year'";
  $results = $db->query($query);
  
  if ($results->num_rows == 1) 
  {
    echo "Schedule already created.Please check again.";
  }
  else
  {
    $query1 = "Select max(CRN) from Course_Schedule";
    $results1 = $db->query($query1);
    $row1 = $results1->fetch_assoc();
    
    $CRN = $row1['max(CRN)'] + 1;
    
    $query2 = "INSERT INTO Course_Schedule VALUES ('$CRN','$CId','$SecNo','$Semester_year','$Inst_SSN','','START')";    
   	$result2 = $db->query($query2);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error inserting the item.';
  		exit;
  	}
    else
    {
      echo "Course schedule created successfully.";
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