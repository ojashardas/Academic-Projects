<html>
<head>
<title>View_Feedbackcoursewise</title>

<script type="text/javascript">

function validatetxtbox()
{
  if(document.forms["feedbackform"]["course_name"].value == "none")
  {
    alert('Course field cannot be left blank');
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
<form onSubmit="return (validatetxtbox());" name ="feedbackform" action="View_Feedbackcourse_next.php" method="POST">
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
                
              $query = "select * from Course_Info";
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
        <td><input type ="submit" value ="Submit"></td>
    </tr>
</table>
</form>
</body>
</html> 