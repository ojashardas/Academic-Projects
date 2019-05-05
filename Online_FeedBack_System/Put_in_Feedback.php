<html>
<head>
<title>Saved/Submitted page</title>
</head>
<body>
<form name ="form_start" method="post" action="Instructor_Courses.php">
<?php
session_start();
$value = $_POST['ssbutton'];
$row_count = $_SESSION['CLO_count'];
$CRN = $_SESSION['CRN'];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  
  $query = "DELETE FROM Feedback where CRN =$CRN";
  $db->query($query);
      
  for ($j =1; $j <= $row_count; $j++)
  {
    $CLO_No  = $_POST["clo_nohidden"."$j"];
    $below = $_POST["belowtextbox"."$j"];
    if ($below == '')
    {
      $below = "NULL";
    }
    $progress = $_POST["progresstextbox"."$j"];
    if ($progress == '')
    {
      $progress = "NULL";
    }
    $meet = $_POST["meettextbox"."$j"];
    if ($meet == '')
    {
      $meet = "NULL";
    }
    $exceed = $_POST["exceedtextbox"."$j"];
    if ($exceed == '')
    {
      $exceed = "NULL";
    }
    $material = $_POST["materialtextbox"."$j"];
    
    $query = "INSERT INTO Feedback VALUES ($CRN,$CLO_No,$below,$progress,$meet,$exceed,'$material')";
    
   	$result = $db->query($query);
  	
   	if ($db->affected_rows != 1) 
    {
  		echo 'There was an error inserting the item.';
  		exit;
  	}
  }
  
  $Comment = $_POST['commentstextarea'];
  /*if ($Comment == '')
    {
      $Comment = "NULL";
    }*/
  if($value == 'SAVE')
  {
    $query = "UPDATE Course_Schedule set Status = 'SAVED',Comment='$Comment' where CRN =$CRN";
    $db->query($query);
    echo "<h2>Your feedback has been successfully saved.</h2>";
  }
  else
  {
    $query = "UPDATE Course_Schedule set Status = 'SUBMITTED',Comment='$Comment' where CRN =$CRN";
    $db->query($query);
    echo "<h2>Your feedback has been successfully submitted.</h2>";
  }
  
  $closed = $db->close();
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
<input type ="submit" value="Return to Course Page" name="ssbutton">
</form>
</body>
</html>