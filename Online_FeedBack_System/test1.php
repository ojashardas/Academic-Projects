<html>
<head>
  <title>Simple JavaScript Example</title>

<script type="text/javascript">

function containsblanks(s)
{
  alert('Inside');
  <?php echo "In php"; ?>
  for(var i = 0; i < s.value.length; i++)  
  { 
      var c = s.value.charAt(i);
      if (((c == ' ') || (c == '\n') || (c == '\t')))
      {
          alert('The field must not contain whitespace');
          return false;
      }
  }
  return true;  
}  
</script>
</head>
<body>
  <h2>Username Form</h2>
  <form onSubmit="return(containsblanks(this.userName));" method="POST" action ="test2.php">
  <input type="text" name="userName" size=10>
  <input type="submit" value="SUBMIT" name="button1">  
  </form>
</body>
</html>