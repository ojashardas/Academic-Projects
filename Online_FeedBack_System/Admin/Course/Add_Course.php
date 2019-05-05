<html>
<head>
<title>Add_Course</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["courseform"]["Course_Notextbox"].value == '')
  {
    alert('Course Number cannot be left blank');
    return false;
  }
  if(document.forms["courseform"]["Course_Notextbox"].value.length != 6)
  {    
      alert('Course Number has to be 6 digits');
      return false;    
  }
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
     alert('Credit has to be numeric');
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
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course/Courses.php">Return to Course Page</a>
<br/>
<br/>
<form onSubmit="return (validatetxtbox());" name ="courseform" action="Add_Course_next.php" method="POST">
<table>
    <tr>      
        <td>Enter Course Number</td><td><input type="text" name="Course_Notextbox" maxlength="6" /></td>
    </tr>
    <tr>      
        <td>Enter Course Name</td><td><input type="text" name="Course_Nametextbox" maxlength="50" /></td>
    </tr>
    <tr>      
        <td>Enter Course Credit</td><td><input type="text" name="Course_Credittextbox"  /></td>
    </tr>
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
</table>
</form>
</body>
</html>