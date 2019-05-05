<html>
<head>
<title>Updation Final</title>
</head>
<body>
<body>
<form>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course_Schedule/Course_Schedule.php">Return to Course-Schedule Page</a>
<br/>
<br/>
<?php
session_start();
$CId = $_POST["course_name1"];
$SecNo = $_POST["secno1"];
$Semester = $_POST["semester1"];
$Year = $_POST["semester_year1"];
$Semester_year = $Semester . " " . $Year; 
$Inst_SSN = $_POST["instructor_name1"];
$CRN = $_SESSION['CRN'];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Course_Schedule where CId = $CId and SecNo='$SecNo' and SemYear ='$Semester_year'";
  $results = $db->query($query);
  
  if ($results->num_rows == 1) 
  {
    echo "Schedule already exists. Please provide new values for updation";
  }
  else
  {
    $query = "UPDATE Course_Schedule SET CId='$CId',SecNo='$SecNo',SemYear='$Semester_year',Inst_SSN='$Inst_SSN' WHERE CRN =$CRN";    
   	$result = $db->query($query);
      	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error updating the item.';
  		exit;
  	}
    else
    {
      echo "Course Schedule updated successfully.";
    }                                                                                 
  }    
  
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</form>
</body>
</html>