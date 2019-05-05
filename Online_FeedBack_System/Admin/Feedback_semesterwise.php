<html>
<head>
<title>View_Feedbacksemesterwise</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["feedbackform"]["semester"].value == "none")
  {
    alert('Semester cannot be left blank');
    return false;
  }
  if(document.forms["feedbackform"]["semester_year"].value == "none")
  {
    alert('Semester year cannot be left blank');
    return false;
  }
  return true;
}
</script>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Feedback_Admin.php">Return to Feedback Page</a>
<br/>
<br/>
<form onSubmit="return (validatetxtbox());" name ="feedbackform" action="View_Feedbacksem_next.php" method="POST">
<table>
    <tr>      
        <td>Enter Semester</td>
        <td>
          <select name ="semester">
             <option value="none"></option> 
             <option value="SPRING">SPRING</option>
             <option value="SUMMER">SUMMER</option>
             <option value="FALL">FALL</option>
          </select>
        </td>
        <td>
          <select name ="semester_year">
          <option value="none"></option>
          <?php 
              $start_year = 2011;
              $current_year = date("Y");              
              while($start_year <= $current_year)
              { 
                echo "<option value=\"$start_year\">$start_year</option>" ;
                $start_year++;
              }
          ?>
          </select>
        </td>
    </tr>    
    <tr>
        <td><input type ="submit" value ="Submit"></td>
    </tr>
</table>
</form>
</body>
</html> 