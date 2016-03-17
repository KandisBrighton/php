<?php
     // Kandis Brighton IT 305 assignment Assn 5a - forms myfunctions.php
    // form validation functions for Name, Year, and credit card for entries
   
    // validName returns true if $string is not empty and is apphabetic.
    function validName($string)
    {
     //print "in myfunctions validName";
      return ctype_alpha($string) AND !empty($string);
    }
    
    /* validYear returns true if $string is not empty and is numeric and
    contains 4 digits and is after 1800.
    */
    
    function validYear($string)
    {
      //print "in myfunctions validYear";
      return ( !empty($string) AND is_numeric($string)  AND
             strlen($string) == 4 AND $string>=1800 );
    }
    
    /* validCreditCard returns true if a credit card number is not black
      and is all numeric after dashes and spaces have been removed.
    */
    
    function validCreditCard($string)
    {
      //print "in myfunctions validCreditCard";  
      $string = str_replace("-", "", $string);
      $string = str_replace(" ", "", $string);
      return (!empty($string) AND is_numeric($string));
    }
    
  ?>