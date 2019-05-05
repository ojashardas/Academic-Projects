<html>
<head>
<title>Delete_Course</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["courseform"]["course_name"].value == "none")
  {
    alert('Course Number cannot be left blank');
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
<form onSubmit="return (validatetxtbox());" name ="courseform" action="Delete_Course_next.php" method="POST">
<table>
    <tr>      
        <td>Select Course Number</td>        
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
                  echo "<option value=\"$row[CId]\">$row[CNo]</option>" ;      
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