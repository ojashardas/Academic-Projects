<html>
<head>
<title>View_Instructor</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["instructorform"]["Instr_SSNtextbox"].value == '')
  {
    alert('Instructor SSN cannot be left blank');
    return false;
  }
  else if(document.forms["instructorform"]["Instr_SSNtextbox"].value.length != 9)
  {    
      alert('Instructor SSN has to be 9 digits');
      return false;
    
  }
  else if(isNaN(document.forms["instructorform"]["Instr_SSNtextbox"].value))
  {
     alert('Instructor SSN has to be numeric');
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
<form onSubmit="return (validatetxtbox());" name ="instructorform" action="View_Instructor_next.php" method="POST">
<table>
    <tr>      
        <td>Enter Instructor SSN</td><td><input type="text" name="Instr_SSNtextbox" maxlength="9" /></td>
    </tr>    
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
</table>
</form>
</body>
</html>