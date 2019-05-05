<?php
  session_start();
  $_SESSION['Cname'] = $_GET['Cname'];  
  $_SESSION['Cno'] = $_GET['Cno'];
  $_SESSION['Secno'] = $_GET['Secno'];
  $_SESSION['SemYear'] = $_GET['SemYear'];
  $_SESSION['CRN'] = $_GET['CRN'];
  $_SESSION['CId'] = $_GET['CId'];
  $_SESSION['Form_Status'] = $_GET['Status'];
  $row_count = 0;
?>

<html>
<head>
<title>Feedback Form</title>
<script type="text/javascript">

var status;
function save1()
{
  status = "SAVE";
}

function submit1()
{
  status = "SUBMIT";
}

function testfun_saved()
{
  var sum;
  for(i=1;i<=document.forms["form_saved"]["no_rows"].value;i++)
  {
    var belowtxt = "belowtextbox" +i;
    var progresstxt = "progresstextbox" +i;
    var meettxt = "meettextbox" +i;
    var exceedtxt = "exceedtextbox" +i;
    var materialtxt = "materialtextbox" +i;
    
    sum =0;
    
    if (isNaN(document.forms["form_saved"][belowtxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_saved"][belowtxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_saved"][progresstxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_saved"][progresstxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_saved"][meettxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_saved"][meettxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_saved"][exceedtxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_saved"][exceedtxt].focus();
      return false;
    }
    if (document.forms["form_saved"][belowtxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_saved"][belowtxt].focus();
      return false;
    }
    if (document.forms["form_saved"][progresstxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_saved"][progresstxt].focus();
      return false;
    }
    if (document.forms["form_saved"][meettxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_saved"][meettxt].focus();
      return false;
    }
    if (document.forms["form_saved"][exceedtxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_saved"][exceedtxt].focus();
      return false;
    }
    if (document.forms["form_saved"][belowtxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_saved"][belowtxt].focus();
      return false;
    }
    if (document.forms["form_saved"][progresstxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_saved"][progresstxt].focus();
      return false;
    }
    if (document.forms["form_saved"][meettxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_saved"][meettxt].focus();
      return false;
    }
    if (document.forms["form_saved"][exceedtxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_saved"][exceedtxt].focus();
      return false;
    }
          
    if(status == 'SUBMIT')
    {
      if (document.forms["form_saved"][belowtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_saved"][belowtxt].focus();
        return false;
      }
      if (document.forms["form_saved"][progresstxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_saved"][progresstxt].focus();
        return false;
      }
      if (document.forms["form_saved"][meettxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_saved"][meettxt].focus();
        return false;
      }
      if (document.forms["form_saved"][exceedtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_saved"][exceedtxt].focus();
        return false;
      }      
      sum = Math.abs(document.forms["form_saved"][belowtxt].value) + Math.abs(document.forms["form_saved"][progresstxt].value) + Math.abs(document.forms["form_saved"][meettxt].value) + Math.abs(document.forms["form_saved"][exceedtxt].value); 
      
      if(sum!=100)
      {
        alert('Total should be equal to 100');
        document.forms["form_saved"][belowtxt].focus();
        return false;
      }
      if (document.forms["form_saved"][materialtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_saved"][materialtxt].focus();
        return false;
      }            
    }    
  }
  
  return true;  
}

function testfun_start()
{
  var sum;
  for(i=1;i<=document.forms["form_start"]["no_rows"].value;i++)
  {
    var belowtxt = "belowtextbox" +i;
    var progresstxt = "progresstextbox" +i;
    var meettxt = "meettextbox" +i;
    var exceedtxt = "exceedtextbox" +i;
    var materialtxt = "materialtextbox" +i;
    
    sum =0;
    
    if (isNaN(document.forms["form_start"][belowtxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_start"][belowtxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_start"][progresstxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_start"][progresstxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_start"][meettxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_start"][meettxt].focus();
      return false;
    }
    if (isNaN(document.forms["form_start"][exceedtxt].value))
    {
      alert('Textbox should contain numerical data');
      document.forms["form_start"][exceedtxt].focus();
      return false;
    }
    if (document.forms["form_start"][belowtxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_start"][belowtxt].focus();
      return false;
    }
    if (document.forms["form_start"][progresstxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_start"][progresstxt].focus();
      return false;
    }
    if (document.forms["form_start"][meettxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_start"][meettxt].focus();
      return false;
    }
    if (document.forms["form_start"][exceedtxt].value < 0)
    {
      alert('Value cannot be negative');
      document.forms["form_start"][exceedtxt].focus();
      return false;
    }
    if (document.forms["form_start"][belowtxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_start"][belowtxt].focus();
      return false;
    }
    if (document.forms["form_start"][progresstxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_start"][progresstxt].focus();
      return false;
    }
    if (document.forms["form_start"][meettxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_start"][meettxt].focus();
      return false;
    }
    if (document.forms["form_start"][exceedtxt].value > 100)
    {
      alert('Value cannot be more than 100');
      document.forms["form_start"][exceedtxt].focus();
      return false;
    }
          
    if(status == 'SUBMIT')
    {
      if (document.forms["form_start"][belowtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_start"][belowtxt].focus();
        return false;
      }
      if (document.forms["form_start"][progresstxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_start"][progresstxt].focus();
        return false;
      }
      if (document.forms["form_start"][meettxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_start"][meettxt].focus();
        return false;
      }
      if (document.forms["form_start"][exceedtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_start"][exceedtxt].focus();
        return false;
      }      
      sum = Math.abs(document.forms["form_start"][belowtxt].value) + Math.abs(document.forms["form_start"][progresstxt].value) + Math.abs(document.forms["form_start"][meettxt].value) + Math.abs(document.forms["form_start"][exceedtxt].value); 
      
      if(sum!=100)
      {
        alert('Total should be equal to 100');
        document.forms["form_start"][belowtxt].focus();
        return false;
      }
      if (document.forms["form_start"][materialtxt].value == '')
      {
        alert('Textbox cannot be left blank');
        document.forms["form_start"][materialtxt].focus();
        return false;
      }            
    }    
  }
  
  return true;  
}


</script>
</head>
<body>
<?php
  if($_SESSION['Form_Status'] == 'START')
  {
?>
<form onSubmit ="return (testfun_start());" name ="form_start" method="post" action="Put_in_Feedback.php">
<table width ="100%">
<caption><h3>Assessment of <?php echo $_SESSION['Cno'].": "; echo $_SESSION['Cname'];  ?></h3></caption>
<tr>
  <td width="50%"><b>Semester: <?php echo $_SESSION['SemYear']?></b></td>
  <td width ="50%" align="right"><b>Section: <?php echo $_SESSION['Secno']?></b></td>
</tr>
</table>
<table width="100%" border="1">
<tr>
  <th width="40%">Class Learning Outcomes</th>
  <th width="10%">Below Expectations</th>
  <th width="10%">Procesing to Criteria</th>
  <th width="10%">Meet Criteria</th>
  <th width="10%">Exceed Criteria</th>
  <th width="20%">Materials Used</th>
</tr>
<?php
  
  @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $CId =  $_SESSION['CId'];
  $query = "SELECT * FROM CLO_Description where CId = '$CId' and Status='ACTIVE'";
  $results = $db->query($query);
  $row_count = $results->num_rows;
  $_SESSION['CLO_count'] = $row_count;
  if ($row_count >0)
  {
     $i =1;
     while ($row = $results->fetch_assoc()) 
    {
?>
<tr>
  <td><input type="hidden" name = "clo_nohidden<?php echo"$i"; ?>" value="<?php echo"$row[CLO_No]"; ?>"></td>
</tr>     
<tr>
  <td><?php echo"$row[CLO]";?></td>
  <td><input type="text" name = "belowtextbox<?php echo"$i"; ?>" ></td>
  <td><input type="text" name = "progresstextbox<?php echo"$i"; ?>" ></td>
  <td><input type="text" name = "meettextbox<?php echo"$i"; ?>" ></td>
  <td><input type="text" name = "exceedtextbox<?php echo"$i"; ?>" ></td>
  <td><input type="text" name = "materialtextbox<?php echo"$i"; ?>" size ="40"></td>
</tr>
<?php
      $i++;
    }
  }
  
  $closed = $db->close();	
	if (!$closed) 
  {
		echo 'There was an error closing the connection to the database. <br/>';		
	}
?>
<tr>
  <td><input type="hidden" name = "no_rows" value="<?php echo"$row_count"; ?>"></td>
</tr>

</table>
</br>
</br>
<table width="100%">
<tr>
  </td><b>Comments:</b></td>
</tr>
<tr>
  <td><textarea name ="commentstextarea" rows="3" cols="76"></textarea></td>
</tr>
</table>
<table width="100%">
<tr>
  <td align= "center"><input type ="reset" value="RESET"></td>
  <td align= "center"><input type ="submit" value="SAVE" name="ssbutton" onclick="save1();"></td>
  <td align= "center"><input type ="submit" value="SUBMIT" name="ssbutton" onclick="submit1();"></td>
</tr>
</table>
</form>
<?php
  }
  else if($_SESSION['Form_Status'] == 'SAVED')
  {
?>
<form onSubmit ="return (testfun_saved());" name ="form_saved" method="post" action="Put_in_Feedback.php">
<table width ="100%">
<caption><h3>Assessment of <?php echo $_SESSION['Cno'].": "; echo $_SESSION['Cname'];  ?></h3></caption>
<tr>
  <td width="50%"><b>Semester: <?php echo $_SESSION['SemYear']?></b></td>
  <td width ="50%" align="right"><b>Section: <?php echo $_SESSION['Secno']?></b></td>
</tr>
</table>
<table width="100%" border="1">
<tr>
  <th width="40%">Class Learning Outcomes</th>
  <th width="10%">Below Expectations</th>
  <th width="10%">Procesing to Criteria</th>
  <th width="10%">Meet Criteria</th>
  <th width="10%">Exceed Criteria</th>
  <th width="20%">Materials Used</th>
</tr>
<?php
  
  @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $CId =  $_SESSION['CId'];
  $CRN = $_SESSION['CRN'];
  $query = "select * from Feedback,Course_Schedule,CLO_Description where 
            Feedback.CRN = Course_Schedule.CRN and Course_Schedule.CId = CLO_Description.CId and 
            CLO_Description.CLO_No = Feedback.CLO_No and Feedback.CRN ='$CRN' and Course_Schedule.CId = $CId;";
  $results = $db->query($query);
  $row_count = $results->num_rows;
  $_SESSION['CLO_count'] = $row_count;
  if ($row_count >0)
  {
     $i =1;
     while ($row = $results->fetch_assoc()) 
    {
?>
<tr>
  <td><input type="hidden" name = "clo_nohidden<?php echo"$i"; ?>" value="<?php echo"$row[CLO_No]"; ?>"></td>
</tr>     
<tr>
  <td><?php echo"$row[CLO]";?></td>
  <td><input type="text" name = "belowtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Below]"; ?>" ></td>
  <td><input type="text" name = "progresstextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Progress]"; ?>" ></td>
  <td><input type="text" name = "meettextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Meet]"; ?>" ></td>
  <td><input type="text" name = "exceedtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Exceed]"; ?>" ></td>
  <td><input type="text" name = "materialtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Material_Used]"; ?>" size ="40"></td>
</tr>
<?php
      $i++;
    }
  }  
?>
<tr>
  <td><input type="hidden" name = "no_rows" value="<?php echo"$row_count"; ?>"></td>
</tr>
</table>
</br>
</br>
<table width="100%">
<tr>
  </td><b>Comments:</b></td>
</tr>
<?php

  $query = "SELECT Comment FROM Course_Schedule where CRN = '$CRN'";
  $results = $db->query($query);
  if($results->num_rows == 1)
  {
      $row = $results->fetch_assoc();
  }
?>
<tr>
  <td><textarea name ="commentstextarea" rows="3" cols="76"><?php echo"$row[Comment]"; ?></textarea></td>
</tr>
</table>
<table width="100%">
<tr>
  <td align= "center"><input type ="reset" value="RESET"></td>
  <td align= "center"><input type ="submit" value="SAVE" name="ssbutton" onclick="save1();"></td>
  <td align= "center"><input type ="submit" value="SUBMIT" name="ssbutton" onclick="submit1();"></td>
</tr>
</table>
</form>
<?php
    $closed = $db->close();	
    if (!$closed) 
    {
	   echo 'There was an error closing the connection to the database. <br/>';		
    }
  }
  else
  {
?>
<table width ="100%">
<caption><h3>Assessment of <?php echo $_SESSION['Cno'].": "; echo $_SESSION['Cname'];  ?></h3></caption>
<tr>
  <td width="50%"><b>Semester: <?php echo $_SESSION['SemYear']?></b></td>
  <td width ="50%" align="right"><b>Section: <?php echo $_SESSION['Secno']?></b></td>
</tr>
</table>
<table width="100%" border="1">
<tr>
  <th width="40%">Class Learning Outcomes</th>
  <th width="10%">Below Expectations</th>
  <th width="10%">Procesing to Criteria</th>
  <th width="10%">Meet Criteria</th>
  <th width="10%">Exceed Criteria</th>
  <th width="20%">Materials Used</th>
</tr>
<?php
  
  @$db = new mysqli('localhost', 'ojash', 'ojash123', 'feedback_system');
	
	if ($db->connect_errno != 0) 
  {
  	echo $db->connect_error;
		exit;
	}
  $CId =  $_SESSION['CId'];
  $CRN = $_SESSION['CRN'];
  $query = "select * from Feedback,Course_Schedule,CLO_Description where 
            Feedback.CRN = Course_Schedule.CRN and Course_Schedule.CId = CLO_Description.CId and 
            CLO_Description.CLO_No = Feedback.CLO_No and Feedback.CRN ='$CRN' and Course_Schedule.CId = $CId;";
  $results = $db->query($query);
  $row_count = $results->num_rows;
  $_SESSION['CLO_count'] = $row_count;
  if ($row_count >0)
  {
     $i =1;
     while ($row = $results->fetch_assoc()) 
    {
?>
<tr>
  <td><?php echo"$row[CLO]";?></td>
  <td><input type="text" name = "belowtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Below]"; ?>" readonly ="readonly"></td>
  <td><input type="text" name = "progresstextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Progress]"; ?>" readonly ="readonly" ></td>
  <td><input type="text" name = "meettextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Meet]"; ?>" readonly ="readonly" ></td>
  <td><input type="text" name = "exceedtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Exceed]"; ?>" readonly ="readonly" ></td>
  <td><input type="text" name = "materialtextbox<?php echo"$i"; ?>" value = "<?php echo"$row[Material_Used]"; ?>" readonly ="readonly" size ="40"></td>
</tr>
<?php
      $i++;
    }
  }  
?>
</table>
</br>
</br>
<table width="100%">
<tr>
  </td><b>Comments:</b></td>
</tr>
<?php

  $query = "SELECT Comment FROM Course_Schedule where CRN = '$CRN'";
  $results = $db->query($query);
  if($results->num_rows == 1)
  {
      $row = $results->fetch_assoc();
  }
?>
<tr>
  <td><textarea name ="commentstextarea" readonly ="readonly" rows="3" cols="76"><?php echo"$row[Comment]"; ?></textarea></td>
</tr>
</table>
<?php
  }
?>
</body>
</html>