<html>
<head>
<title>Course Schedule Updation</title>
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
  $query = "SELECT * FROM Course_Schedule where CId = $CId and SecNo='$SecNo' and SemYear ='$Semester_year'";
  $results = $db->query($query);
  
  if ($results->num_rows == 1) 
  {
    $row = $results->fetch_assoc();
    if($row['Status']!= 'START')
    {
      echo "Schedule can't be updated as feedback has been submitted or it is in progress for the selected schedule.";
    }
    else
    {
      $_SESSION['CRN'] = $row['CRN'];
      //$a = $row['CRN'];
      //echo "$a can be updated.";
      header('Location:http://localhost/project/Admin/Course_Schedule/Update_display.php');
    }
  }
  else
  {
    echo "Schedule selected does not exist. Please check again.";                                                                                 
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