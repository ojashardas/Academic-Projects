<html>
<head>
<title>Update Instructor Information</title>
<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["instructorform"]["Inst_Nametextbox"].value == '')
  {
    alert('Instructor Name cannot be left blank');
    return false;
  }
  if(document.forms["instructorform"]["Inst_Officetextbox"].value == '')
  {
    alert('Instructor Office cannot be left blank');
    return false;
  }
  return true;
}
</script>
</head>
<body>
<form onSubmit="return (validatetxtbox());" name ="instructorform" action="Update_Instructor_Final.php" method="POST">
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Instructor/Instructors.php">Return to Instructor Page</a>
<br/>
<br/>
<?php
$Instr_SSN = $_POST["Instr_SSNtextbox"];

@$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $query = "SELECT * FROM Instructor_Info where Inst_SSN ='$Instr_SSN'";
  $results = $db->query($query);
  if ($results->num_rows == 1) 
  {
    $row = $results->fetch_assoc();
?>
    <table>
    <tr>
    <td>Instructor SSN</td>
    <td><input type="textbox" name="Inst_SSNtextbox" readonly ="readonly" value ="<?php echo "$row[Inst_SSN]";?>"></td>
    </tr>
    <tr>
    <td>Instructor Name</td>
    <td><input type="textbox" name="Inst_Nametextbox" value ="<?php echo "$row[Inst_Name]";?>"></td>
    </tr>
    <tr>
    <td>Instructor Office</td>
    <td><input type="textbox" name="Inst_Officetextbox" value ="<?php echo "$row[Inst_Office]";?>"></td>
    </tr>
    <tr>
    <td>Instructor NetID</td>
    <td><input type="textbox" name="Inst_NetIDtextbox1" readonly="readonly" value ="<?php echo "$row[Inst_NetID]";?>" maxlength="9"></td>
    </tr>
    <tr>
    <td>Instructor Password</td>
    <td><input type="password" name="Inst_Passwordtextbox1" value =""></td>
    <td>Leave field blank if the old password is to be retained.</td>
    </tr>
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
    </table> 
<?php    
  }	
  else
  {
    echo "Instructor with $Instr_SSN does not exist.Please enter again";
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