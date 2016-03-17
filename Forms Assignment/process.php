
<?php
  // Kandis Brighton IT 305 assignment Assn 5a - forms process.php
  // php document to process the information typed into a form

  include ("myfunctions.php"); // include validity functions
    // print out input array for testing purposes
    /*
    print "<pre>";
    print_r($_GET);
    print "</pre>";
    */
 
    // check of name is valid 
    if (validName($_GET['first'])) {
         $firstName = $_GET['first'];
         echo "<p>Hello, $firstName!</p>";
    } else {
         echo "<p>First name is required.</p>";
    }
 
    // check if year is valid
    if (validYear($_GET['year']))
    {
      $year = $_GET['year'];
      print "<p>Birth year: $year </p>";
    } else { 
      print "<p>Invalid year. </p>";
    }
     
    // check if credit card is valid
    if (validCreditCard($_GET['ccnum']))
    {
      $ccnum = $_GET['ccnum'];
      echo "<p>Credit card number: $ccnum</p>";
    } else {
      echo "<p>Invalid credit card number.</p>";
    }
        
?>
 