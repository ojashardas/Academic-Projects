<html>
<head>
  <title>Feedbacks By Course</title>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Feedback_Admin.php">Return to Feedback Page</a>
<br/>
<br/>

<?php
session_start();
$SCId = $_POST["course_name"];
 
@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
if ($db->connect_errno != 0) 
{
	echo $db->connect_error;
	exit;
}
  
$query = "select * from Instructor_Info,Course_Info,Course_Schedule where
          Course_Schedule.CId = Course_Info.CId and
          Course_Schedule.Inst_SSN = Instructor_Info.Inst_SSN and
          Course_Schedule.CId = '$SCId' and Course_Schedule.Status='SUBMITTED' ";
$results = $db->query($query);

if ($results->num_rows == 0 ) 
{
	echo "<h4>There are no feedback(s) for the  course.</h4></br>";
}
else 
{
?>
    <h4>List of <?php echo $results->num_rows; ?> feedback(s) submitted for the course  </h4>
    <table width="100%">
    <tr>
      <th width="17%">Course Number</th>
      <th width="17%">Course Name</th>
      <th width="15%">SecNo</th>
      <th width="17%">SemYear</th>
      <th width="17%">Instructor Name</th>
      <th width="17%">Link</th>
    </tr>
<?php
    
    while ($row = $results->fetch_assoc()) 
    {
    $form_status = "SUBMITTED";
?>
		  <tr>
        <td width="17%" align ="center">
          <?php echo "$row[CNo]"; ?>
        </td>
        <td width="17%" align ="center">
          <?php echo "$row[CName]"; ?>
        </td>
        <td width="15%" align ="center">
          <?php echo "$row[SecNo]"; ?>
        </td>
        <td width="17%" align ="center">
          <?php echo "$row[SemYear]"; ?>
        </td>
        <td width="17%" align ="center">
          <?php echo "$row[Inst_Name]"; ?>
        </td>
        <td width="17%" align ="center">
        <a href ="http://localhost/project/Feedback_form.php?Cname=<?php echo"$row[CName]"; ?>&Cno=<?php echo"$row[CNo]"; ?>&Secno=<?php echo"$row[SecNo]"; ?>&SemYear=<?php echo"$row[SemYear]"; ?>&CRN=<?php echo"$row[CRN]"; ?>&CId=<?php echo"$row[CId]"; ?>&Status=<?php echo"$form_status"; ?>">View Feedback</a> 
        <br/>
        </td>
        </tr>
<?php
		}    
    echo "</table>";
  }

  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
</body>
</html>