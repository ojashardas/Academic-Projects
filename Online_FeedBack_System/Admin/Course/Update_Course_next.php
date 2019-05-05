<html>
<head>
<title>Update Course Information</title>
<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["courseform"]["Course_Nametextbox"].value == '')
  {
    alert('Course Name cannot be left blank');
    return false;
  }
  if(document.forms["courseform"]["Course_Credittextbox"].value == '')
  {
    alert('Course Credit cannot be left blank');
    return false;
  }
  if(isNaN(document.forms["courseform"]["Course_Credittextbox"].value))
  {
     alert('Course Credit has to be numeric');
     return false;
  }  
  if(document.forms["courseform"]["Course_Credittextbox"].value < 1 || document.forms["courseform"]["Course_Credittextbox"].value > 4)
  {
    alert('Course Credit has to be between 1 and 4');
    return false;
  }
  return true;
}
</script>
</head>
<body>
<form onSubmit="return (validatetxtbox());" name ="courseform" action="Update_Course_Final.php" method="POST">
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<?php
session_start();
$CId = $_POST["course_name"];
$_SESSION['Cid'] = $CId;

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Course_Info where CId ='$CId'";
  $results = $db->query($query);
  if ($results->num_rows == 1) 
  {
    $row = $results->fetch_assoc();
?>
    <h3>Fill the fields that need to be updated</h3>
    <table>
    <tr>
      <td>Course Number</td>
      <td><input type="textbox" name="Course_Notextbox" readonly ="readonly" value ="<?php echo "$row[CNo]";?>"></td>
    </tr>
    <tr>
      <td>Course Name</td>
      <td><input type="textbox" name="Course_Nametextbox" value ="<?php echo "$row[CName]";?>"></td>
    </tr>
    <tr>
      <td>Course Credit</td>
      <td><input type="textbox" name="Course_Credittextbox" value ="<?php echo "$row[Credit]";?>"></td>
    </tr>
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
    </table> 
<?php    
  }	
  else
  {
    echo "Course with $Course_No does not exist.Please enter again";
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