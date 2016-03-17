<!DOCTYPE html>
<!--Kandis Brighton-->
<!--IT 305 -->
<!--1/22/2016-->
<!--PHP practice.-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP String Manipulation</title>
    </head>
    <body>
        <p><b>PHP String Manipulation</b></p>
        <?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        
        $phrase = " I like PHP ";
       
        echo trim($phrase);
        echo "<br>The string has " . strlen($phrase) . " characters.";
        echo "<br>PHP is located in position " . strpos($phrase,"PHP");
        echo "<br>" . str_replace("like", "love", $phrase);
        echo "<br>" . strtoupper($phrase);
        echo "<br>";
 
        function printBackwards($string)
        {
      
            $pos = strlen($string) -1;
            echo "<br>";
            while ($pos >= 0)
            {
               echo $string[$pos];
               $pos = $pos-1;            
            }
        }
        
        printBackwards("Hi there!");
        printBackwards($phrase);
        
        echo "<br><br>";
        echo "<b>Extra practice with functions:</b><br><br>";
        
        function greeting($name)
        {
            print "Hello, $name!";
        }
        greeting ("Sam");
        
        function average($num1, $num2)
        {
            $avg=($num1 + $num2)/2;
            return $avg;
        }
        $a = 5;
        $b = 3;
        print "<br>The average of $a and $b is " . average($a, $b);
        
        function largest ($num1, $num2)
        {
            if ($num1 > $num2)
                return $num1;
            else
                return $num2;
        }
        print "<br>The largest of $a and $b is " . largest($a, $b);
        
        function circumference($radius)
        {
            $circ = 3.14 * 2 * $radius;
            return $circ;
        }
        $radius = 5;
        print "<br>The circumference is " . circumference($radius);

        
        function printPhrase($phrase = "Quack")
        {
            echo "<p>$phrase</p>";
        }
        printPhrase("Honk");
        printPhrase();
        
        
        $globalVar = "Global";
        function scopeExample()
        {
            global $globalVar;
            echo "<b>Inside function: </b><br>";
            $localVar = "Local";
            echo "$localVar<br>";
            echo "$globalVar"."<br><br>";
        }
        scopeExample();
        echo "<b>Outside function:</b><br>";
       // echo "$localVar<br>";
        echo "$globalVar<br>";
        
 
        ?>
    </body>
</html>
        