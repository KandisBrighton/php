<?php
     // Kandis Brighton IT 305 assignment Assn 5b - pizza forms pizzaFunctions.php
    // form validation functions for Name, 
   
   // validName returns true if $string is not empty and is apphabetic.
    function validName($name)
    {
      return ctype_alpha($name) AND !empty($name);
    }
    
    // validMethod checks if the method radio button is delivery or pickup
    function validMethod($method)
    {
        return $method == "pickup"  OR $method =="delivery";
    }
    // validToppings checks if the toppings are valid
    function validToppings($toppings)
    {
         $validToppingsArray = array("pepperoni","sausage","olives", "artichokes" ,"anchovies");
         foreach ($toppings as $topping)
         {
            if (!in_array($topping, $validToppingsArray))
            {
              return false;
            }
         }
       
         // if we made it this far, all of our toppings are valid
         return true;
    }
    // check if our crust is valid
    function validCrust($crust)
    {
         $validCrustArray = array("thin","thick","wheat", "glutenfree");
         if (!in_array($crust, $validCrustArray))
            {
              return false;
            }
         // if we made it this far, the crust is valid
         return true;
    }
    function validSize($size)
    {
        $validSizeArray = array("small","medium","large");
        if (!in_array($size, $validSizeArray))
        {
          return false;
        }
        // if we made it this far, the size is valid
        return true;
    }
    
?>
    