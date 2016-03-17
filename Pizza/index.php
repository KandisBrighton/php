<!-- Assn 5b Pizza Form index.php  Poppa's Pizza -->

<?php
  // Turn on error reporting
  ini_set('display_errors',1);
  
  // Include the pizza validation functions
  include ("includes/pizzaFunctions.php");
?>

<!DOCTYPE html>
<html>
	<head> 
		<title>Poppa's Pizza</title>
		<link rel="stylesheet" type="text/css" href="styles/pizzaStyles.css">  
		<style type="text/css"></style>
		
	</head>
	<body>
	  <?php
		// see if the form has been submitted
		if (isset($_GET['submit'])) {
			//create a boolean flag to track validation errors
			$isValid = true;
			$fname = "";
			//check first name
			if (validName($_GET['fname'])) {
				$fname = $_GET['fname'];
			} else {
				print "<p>Invalid first name.</p>";
				$isValid = false;
			}
			$lname = "";
			if (validName($_GET['lname'])) {
				$lname = $_GET['lname'];
			} else {
				print "<p>Invalid last name.</p>";
				$isValid = false;
			}
			//Get the method (pick up or delivery)
			$method = "";
			if (isset($_GET['method']) AND validMethod($_GET['method'])) {
				$method = $_GET['method'];
			} else {
				print "<p>Please select Pick-up or Delivery. </p>";
				$isValid = false;
			}
			// check for address if method is delivery
			$address = "";
			if ($method == 'delivery') {
				if (!empty($_GET['address'])) {
					$address = $_GET['address'];
				} else {
					print '<p>Please enter a delivery address.</p>';
					$isValid = false;
				}
			}
			// check if toppings are valid
			
			$toppingsChosen = "";
			$toppingCount = 0;
			if (isset($_GET['toppings'])) {
				$toppingsChosen = $_GET['toppings'];
				if (!validToppings($toppingsChosen)) {
					print "<p>Aack! I've been spoofed. Stop messing with my topings!</p>";
					$isValid = false;
					//return;
				} else {
				$toppingCount = sizeof($toppingsChosen);
				//print $toppingCount;
				}
			}
			// check if crust is valid
			$crust = "";
			if (isset($_GET['crust']) AND validCrust($_GET['crust'])) {
				$crust = $_GET['crust'];
			} else {
				// since there is a default, if it is not valid, then spoof!
				print "<p>Aack! Crust spoof! Be gone bad one!</p>";
				$isValid = false;
				//return;
			}
			// check if size is selected and then if valid
			$size = "";
			if ($_GET['size']!='none')
			{
				if (validSize($_GET['size']))
				{
					$size=$_GET['size'];
				} else
				{
					print "<p>Aack! Size spoof! Go away evil doer!</p>";
					$isValid = false;
					//return;
				}
			} else
			{
				print "<p>Please select a size.</p>";
				$isValid = false;
			}
			// if the form is valid then terminate the program and pring out the following.
			if ($isValid)
			{
				// call the termination page.
				   print "<div id=summary>";
				   print "<h1>Poppa's Pizza Order Summary</h1>";
				   
				   print "<p>Thank you for your order, $fname $lname.</p>";
				   print "<p>Method: $method</p>";
				   print "<p>Address: $address</p>";
				   print "<p>Toppings: ";
				   // I tried foreach here, but got an error message when $toppings_chosen was empty
				   for ($i=0; $i<sizeof($toppingsChosen); $i++)
				       {
						   print "$toppingsChosen[$i] ";
				       }
				   
				   print "</p>";
				   print "<p>Topping Count: $toppingCount</p>";
				   print "<p>Crust Type: $crust</p>";
				   print "<p>Size: $size</p>";
				   
				   print "</div>";
				   return;
		   }
		}
		?>
 	  <div id="main">
	    <h1>Welcome to Poppa's Pizza</h1>
		<!-- Form has not been submitted or there are validation errors:  Display form -->
		<form method="get" action="">
         <fieldset>
			 
	       <legend>Contact Info</legend>
                    First Name:&nbsp;<input type="text" size="20" maxlength="20" name="fname" id="fname" value ="<?php echo $fname; ?>" >&nbsp;
				    Last Name:&nbsp;<input type="text" size="20" maxlength="20" name="lname" id="lname" value ="<?php echo $lname; ?>" ><br>
		    <label>Address:<br>
                   <textarea rows="5" cols="20" name="address" id="address" value ="<?php echo $address; ?>" ></textarea>
            </label>
         </fieldset>

		 <fieldset>
            <legend>Choose One</legend>
		    <label><input type="radio" value="pickup" name="method" id="method"  >&nbsp;Pick-up</label><br>
		    <label><input type="radio" value="delivery" name="method" id="method" >&nbsp;Delivery</label>		
         </fieldset>

         <fieldset>
           <legend>Toppings</legend>
           <label><input type="checkbox" value="pepperoni" name="toppings[]">
                   Pepperoni</label><br>
           <label><input type="checkbox" value="sausage" name="toppings[]">
                   Sausage</label><br>
           <label><input type="checkbox" value="olives" name="toppings[]">
                   Olives</label><br>
           <label><input type="checkbox" value="artichokes" name="toppings[]">
                   Artichokes</label><br>
           <label><input type="checkbox" value="anchovies" name="toppings[]">
                   Anchovies</label><br>
         </fieldset>

		 <fieldset>
           <legend>Crust</legend>
           <label><input type="radio" value="thin" name="crust" checked="checked">
                   Thin</label><br>
           <label><input type="radio" value="thick" name="crust">
                   Thick</label><br>
           <label><input type="radio" value="wheat" name="crust">
                    Wheat</label><br>
           <label><input type="radio" value="glutenfree" name="crust">
                    Gluten-free</label><br>
         </fieldset>
				
		 <fieldset>
			<legend>Select Size</legend>
		    <select name="size" id="size">
			<option value="none">Select a Size</option>
			<option value="small">Small</option>
			<option value="medium">Medium</option>
			<option value="large">Large</option>
		    </select>
		 </fieldset>
		
		 <p><input type="submit" id="submit" name="submit" value="Submit your order"></p>
	  </form>
    </div>
  </body>
</html>