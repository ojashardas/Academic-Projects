<html>
<head>
<title>Add_Instructor</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["instructorform"]["Instr_SSNtextbox"].value == '')
  {
    alert('Instructor SSN cannot be left blank');
    return false;
  }
  if(document.forms["instructorform"]["Instr_SSNtextbox"].value.length != 9)
  {    
      alert('Instructor SSN has to be 9 digits');
      return false;
    
  }
  if(isNaN(document.forms["instructorform"]["Instr_SSNtextbox"].value))
  {
     alert('Instructor SSN has to be numeric');
     return false;
  }
  if(document.forms["instructorform"]["Instr_Nametextbox"].value == '')
  {
    alert('Instructor Name cannot be left blank');
    return false;
  }
  if(document.forms["instructorform"]["Instr_Officetextbox"].value == '')
  {
    alert('Instructor Office cannot be left blank');
    return false;
  }
  if(document.forms["instructorform"]["Instr_NetIDtextbox"].value == '')
  {
    alert('Instructor NetID cannot be left blank');
    return false;
  }
  if(document.forms["instructorform"]["Instr_NetIDtextbox"].value.length != 9)
  {
    alert('Instructor NetID has to be 9 characters long');
    return false;
  }
  if(document.forms["instructorform"]["Instr_Passwordtextbox"].value == '')
  {
    alert('Instructor Password cannot be left blank');
    return false;
  }
  return true;
}
</script>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Instructor/Instructors.php">Return to Instructor Page</a>
<br/>
<br/>
<form onSubmit="return (validatetxtbox());" name ="instructorform" action="Add_Instructor_next.php" method="POST">
<table>
    <tr>      
        <td>Enter Instructor SSN</td><td><input type="text" name="Instr_SSNtextbox" maxlength="9" /></td>
    </tr>
    <tr>      
        <td>Enter Instructor Name</td><td><input type="text" name="Instr_Nametextbox" maxlength="50" /></td>
    </tr>
    <tr>      
        <td>Enter Instructor Office</td><td><input type="text" name="Instr_Officetextbox" maxlength="15" /></td>
    </tr>
    <tr>      
        <td>Enter Instructor NetID</td><td><input type="text" name="Instr_NetIDtextbox" maxlength="9" /></td>
    </tr>
    <tr>      
        <td>Enter Instructor Password</td><td><input type="password" name="Instr_Passwordtextbox" maxlength="20" /></td>
    </tr>    
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
</table>
</form>
</body>
</html>