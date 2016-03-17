<?php
/* Kandis Brighton
 * 2/10/16
 * http://kbrighton.greenrivertech.net/305/hello.php
 */

 require '../../db.php';
 
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hello</title>
  </head>
  <body>
     <?php
  /*   Array
       (
        [first] => kandis
        [age] => 51
        [color] => blue
       )
    
       print "<pre>";
       print_r($_GET);
       print "</pre>";
  */
       if (isset($_GET['btnSubmit']))
	   {
		  $valid = true;
		  // validate name
		  if (!empty($_GET['first']))
		  {
			   $first = $_GET['first'];
		  }
		  else
		  {
			   echo "<p>Please enter a first name.</p>";
         	   $valid = false;
		  }
	 
		   // validate age
		   if (!empty($_GET['age']))
		   {
			   $age = $_GET['age'];
			   if (!ctype_digit($age))
			   {
				   echo "<p>Age must be numeric.</p>";
				   $valid = false;
				}
		   }
		   else
		   {
			   echo "<p>Please enter age. </p>";
			   $valid = false;
		   }
		  
		   
		   
		   // validate color
		   if (isset($_GET['color']))
		   {
			   $color = $_GET['color'];
			   $colors = array("red", "blue", "yellow");
			   if (!in_array($color, $colors))
			   {
				   echo "<p>AAACK!!! Go away, evildoer!</p>";
				   $valid = false;
			   }
		   }
		   else
		   {
			 echo "<p>Please select a color. </p>";
			 $valid = false;
		   }
			   //display summary
		   if ($valid)
		   {
				   print "Hello, $first <br>";
				   print " Your age is: $age <br>";
				   print "Your favorite color is $color <br>";
				   // Prevent SQL Injection  -- DO THIS!!!!!!!!!! Escapes anything that might cause a problem
				   $first = mysqli_real_escape_string($cnxn,$first);
				   $age = mysqli_real_escape_string($cnxn,$age);
				   $color = mysqli_real_escape_string($cnxn,$color);
				   // write to database
				   $sql = "INSERT INTO hello (name, age, color)
				           VALUES ('$first',$age,'$color')";
				   @mysqli_query($cnxn, $sql) or
				      die ("Error executing query: $sql"); // print sql for testing only!!!!
				   return;
		   }
	   }
    ?>
   <!-- <form method="get" action="hello-process.php"> -->
    <form method="get" action = "">  <!-- will send data to itself -->
	<label>Please enter your first name:
          <input type="text" name="first" value ="<?php echo $first; ?>" >   <!-- this will be changed later -->
        </label><br>
        
        <label>Age:
          <input type="text" name="age" value ="<?php echo $age; ?>" >  <!-- required>  -->
        </label><br>
	
	<label>Favorite Color:</label>
	<br>
	  <?php
	  $colors = array("red", "blue", "yellow");
	  foreach ($colors as $aColor)
	  {
		echo "<input type='radio' name='color' value = '$aColor' ";
		// check to see if this is the selected color
		if ($aColor == $color)
		{
		  echo "checked";
		}
		echo "> $aColor<br>";
		
	  }
//	  <input type='radio' name='color' value='red'>red<br><input type='radio' name='color' value='blue'>blue<br><input type='radio' name='color' value='yellow'>yellow<br>        
	 ?>
	<input type="submit" value="Submit" name="btnSubmit">
   </form>
	<h3>Submissions</h3>
	<?php
	$sql = "SELECT * FROM hello";
	$result = @mysqli_query($cnxn,$sql)
	   or die ("Error excuting query: $sql"); // just for debugging
	   while ($row = mysqli_fetch_array($result))  // get one row at a time until we run out of rows
	   {
		  $id = $row['id'];
		  $name = $row['name'];
		  $age = $row['age'];
		  $color = $row['color'];
		  echo "$id, $name, $age, $color<br>";
	   }
	 
	?>
   
  </body>
</html>    