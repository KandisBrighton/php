<!DOCTYPE html>
<!--Kandis Brighton-->
<!--IT 305 -->
<!--1/26/2016-->
<!--PHP practice 2-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Practice</title>
    </head>
    <body>
        <p><b>PHP Practice</b></p>
        <?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $num = 150;
        if ($num > 100)
        {
            print "big";
        }
        if (($num % 2) == 0)
        {
            print "even";
        }
        else
        {
            print "odd";    
        }
        $month = 3;
        if ($month == 1)
        {
            print "January";
        }
        else if($month == 2)
        {
            print "February";
        }
        else if ($month == 3)
        {
            print "March";
        }
        
        
        ?>
    </body>
</html>