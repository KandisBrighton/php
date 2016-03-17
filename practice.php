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
        <h1>PHP Practice</h1>
        <?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        
        
        // function converting numerical grade to letter grade.
        function letterGrade($grade)
        {
            print "$grade: ";
            if ($grade >= 90 && $grade <= 100)
            {
                print "A";
            }
            else if ($grade >= 80 && $grade <= 89)
            {
                print "B";
            }
            else if ($grade >= 70 && $grade <= 79)
            {
                print "C";
            }
            else if ($grade >= 60 && $grade <= 69)
            {
                print "D";
            }
            else
            {
                print "F";
            }
            print "<br>";
        }
        
        // test the letterGrade function
        print "<h2>Letter Grades</h2>";
        $grade = 95;
        letterGrade($grade);
        $grade = 60;
        letterGrade($grade);
        $grade = 77;
        letterGrade($grade);
        $grade = 50;
        letterGrade($grade);
        print "<br>";
        
        // set up an array of names
        $names = array("Larry", "Kandis","Jonathan", "Rebeka","David");
   
        // test different ways of printing the array     
        print "<pre>";
        print "<h2>Names Array</h2>";
        print_r($names);        
        print "</pre>";
        print "<br>First Name in array ";
        print $names[0];
        print "<br>Last Name in array ";
        $numElements = sizeof($names);
        print $names[$numElements-1];
        print "<br>";
        
        // for loop to print out the array
        print "<h2>For Loop</h2>";
        for ($i=0; $i < $numElements; $i++)
        {
            print $names[$i] . "<br>";
        }
        
        // foreach loop to print out the array
        print "<h2>For-Each Loop</h2>";
        foreach ($names as $name)
        {
            print $name . "<br>";
        }
        
        // make an associative array of courses
        $courses = array("Computer Model" => 3.7,  "Operation Res" => 4.0,
                         "Data Structures" => 3.7,  "Graphics" => 4.0,
                         "Assembl Lang" => 2.7,  "Electricity/Magnet" => 3.7,
                         "C++" => 4.0);
        print "<br><br>";
        print "<h2>College Courses I've taken:</h2>";
        
        // print out the associative array
        foreach ($courses as $course => $decimalGrade)
        {
            
            print "<pre>Course: <b>$course</b>" ."    Grade: " . number_format($decimalGrade, 1) ."</pre>";
        }
        print "<br><br>";
        ?>
    </body>
</html>