<html>
<head>
<title>Create_Schedule</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["coursescheduleform"]["course_name"].value == "none")
  {
    alert('Course cannot be left blank');
    return false;
  }
  if(document.forms["coursescheduleform"]["secno"].value == "none")
  {
    alert('SecNo cannot be left blank');
    return false;
  }
  if(document.forms["coursescheduleform"]["semester"].value == "none")
  {
    alert('Semester cannot be left blank');
    return false;
  }
  if(document.forms["coursescheduleform"]["semester_year"].value == "none")
  {
    alert('Semester year cannot be left blank');
    return false;
  }
  
  if(document.forms["coursescheduleform"]["instructor_name"].value == "none")
  {
    alert('Instructor Name cannot be left blank');
    return false;
  }
  return true;
}
</script>
</head>
<body>
<a href="http://localhost/project/Admin/Admin.php">HOME</a>&nbsp;&nbsp;
<a href="http://localhost/project/Admin/Course_schedule/course_schedule.php">Return to Course-Schedule Page</a>
<br/>
<br/>
<form onSubmit="return (validatetxtbox());" name ="coursescheduleform" action="Create_schedule_next.php" method="POST">
<table>
    <tr>      
        <td>Enter Course</td>        
        <td>
          <select name ="course_name">
          <option value="none"></option>
          <?php 
              session_start();
              @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
              if ($db->connect_errno != 0) 
              {
              	echo $db->connect_error;
              	exit;
              }
                
              $query = "select * from Course_Info where Status ='ACTIVE'";
              $results = $db->query($query);
              
              if ($results->num_rows == 0 ) 
              {
              	echo "<h4>There are no courses available.</h4></br>";
              }
              else 
              {            
                  while($row = $results->fetch_assoc())
                { 
                  $course_desc = $row[CNo]." ".$row[CName];
                  echo "<option value=\"$row[CId]\">$course_desc</option>" ;      
                }
              }
          ?>
          </select>
        </td>
    </tr>
    <tr>
      <td>Enter Section</td>
      <td>
          <select name ="secno">
             <option value="none"></option> 
             <option value="001">001</option>
             <option value="002">002</option>
             <option value="003">003</option>
          </select>
        </td>
    </tr>
    <tr>      
        <td>Enter Semester</td>
        <td>
          <select name ="semester">
             <option value="none"></option> 
             <option value="SPRING">SPRING</option>
             <option value="SUMMER">SUMMER</option>
             <option value="FALL">FALL</option>
          </select>
          <select name ="semester_year">
          <option value="none"></option>
          <?php 
              $current_year = date("Y");
              $next_year = $current_year + 1;              
              echo "<option value=\"$current_year\">$current_year</option>" ;
              echo "<option value=\"$next_year\">$next_year</option>" ;
          ?>
          </select>
        </td>
    </tr>
    <tr>      
        <td>Enter Instructor</td>        
        <td>
          <select name ="instructor_name">
          <option value="none"></option>
          <?php 
              session_start();
              @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
              if ($db->connect_errno != 0) 
              {
              	echo $db->connect_error;
              	exit;
              }
                
              $query = "select * from Instructor_Info";
              $results = $db->query($query);
              
              if ($results->num_rows == 0 ) 
              {
              	echo "<h4>There are no instructors available.</h4></br>";
              }
              else 
              {            
                  while($row = $results->fetch_assoc())
                { 
                  echo "<option value=\"$row[Inst_SSN]\">$row[Inst_Name]</option>" ;      
                }
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