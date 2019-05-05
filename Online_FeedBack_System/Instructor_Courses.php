<html>
<head>
  <title>Instructor</title>
</head>
<body>
<a href ="http://localhost/project/Login.html">LOGOUT</a>
<?php
session_start();
 $Inst_SSN = $_SESSION['Inst_SSN'];
 
 @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  
  $query = "SELECT * FROM Course_Info,Course_Schedule WHERE Course_Info.CId = Course_Schedule.CId and Inst_SSN ='$Inst_SSN' and Course_Schedule.Status ='START'";
  $results = $db->query($query);
  $query1 = "SELECT * FROM Course_Info,Course_Schedule WHERE Course_Info.CId = Course_Schedule.CId and Inst_SSN ='$Inst_SSN' and Course_Schedule.Status ='SAVED'";
  $results1 = $db->query($query1);
  if ($results->num_rows == 0 && $results1->num_rows == 0) 
  {
		echo "<h4>Currently you have no feedback(s) to submit</h4></br>";
  }
  else if ( $results->num_rows > 0)
  {
?>
    <h4>Currently you have <?php echo $results->num_rows; ?> feedback(s) to submit: </h4>
    <table width="100%">
<?php
    $form_status =  "START";
    while ($row = $results->fetch_assoc()) 
    {
?>
		  <tr>
      <td width="50%">
        <?php echo "$row[CName]#: $row[CNo]#: $row[SecNo]#: $row[SemYear]"; ?>
      </td>
      <td width="50%">
      <a href ="Feedback_form.php?Cname=<?php echo"$row[CName]"; ?>&Cno=<?php echo"$row[CNo]"; ?>&Secno=<?php echo"$row[SecNo]"; ?>&SemYear=<?php echo"$row[SemYear]"; ?>&CRN=<?php echo"$row[CRN]"; ?>&CId=<?php echo"$row[CId]"; ?>&Status=<?php echo"$form_status"; ?>">Proceed to Feedback</a> 
      <br/>
      </td>
      </tr>
<?php
		}    
    echo "</table>";
  } 
  
  if ($results1->num_rows > 0) 
  {
?>
		<h4>Currently you have <?php echo $results1->num_rows; ?> feedback(s) in progress: </h4>
    <table width="100%">
<?php
    $form_status =  "SAVED";
    while ($row = $results1->fetch_assoc()) 
    {
?>
		  <tr>
      <td width ="50%">
        <?php echo "$row[CName]#: $row[CNo]#: $row[SecNo]#: $row[SemYear]"; ?>
      </td>
      <td width="50%">
      <a href ="Feedback_form.php?Cname=<?php echo"$row[CName]"; ?>&Cno=<?php echo"$row[CNo]"; ?>&Secno=<?php echo"$row[SecNo]"; ?>&SemYear=<?php echo"$row[SemYear]"; ?>&CRN=<?php echo"$row[CRN]"; ?>&CId=<?php echo"$row[CId]"; ?>&Status=<?php echo"$form_status"; ?>">Proceed to Saved Feedback</a> 
      <br/>
      </td>
      </tr>
<?php
		}    
    echo "</table>";
  }
  
  
  
  $query = "SELECT * FROM Course_Info,Course_Schedule WHERE Course_Info.CId = Course_Schedule.CId and Inst_SSN ='$Inst_SSN' and Course_Schedule.Status ='SUBMITTED'";
  $results = $db->query($query);
  if ($results->num_rows > 0) 
  {
?>
    <h4>You have submitted the below feedback(s)</h4>
    <table width="100%">
<?php
    $form_status =  "SUBMITTED";
    while ($row = $results->fetch_assoc()) 
    {
?>
			<tr>
      <td width="50%">
        <?php echo "$row[CName]#: $row[CNo]#: $row[SecNo]#: $row[SemYear]"; ?>
      </td>
      <td width="50%">
      <a href ="Feedback_form.php?Cname=<?php echo"$row[CName]"; ?>&Cno=<?php echo"$row[CNo]"; ?>&Secno=<?php echo"$row[SecNo]"; ?>&SemYear=<?php echo"$row[SemYear]"; ?>&CRN=<?php echo"$row[CRN]"; ?>&CId=<?php echo"$row[CId]"; ?>&Status=<?php echo"$form_status"; ?>">View Submitted Feedback</a> 
      </br>
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