<?php
function viewReports($therapist)
{
        echo "View reports called \n";
        //return true;

        $con = mysqli_connect("localhost", "admin", "password", "masterDB");
        mysqli_select_db($con, "masterDB");

        //Checking if connected to database
        if (!$con){
                logError("Connection Failed: " . mysqli_connect_error());
                die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected to database\n";
        //Finds users with their therapist
      //  $s = "select * from members where Therapist = '$therapist'";
        $s = "select * from patientInfo";
       $t = mysqli_query($con,$s);
        echo "MySQL Query sent\n";
        $rowCount = mysqli_num_rows($t);

        //Created an array for the values we're pulling
        $array = array();
        //Used to keep track of column values (horizontal)
        $colCounter = 0;
        while($fetch = mysqli_fetch_field($t))
        {
                //Counter used to index values set to key in 2 dimensional array.
                $tmpCount = 0;
                //Takes each row one at a time.
                while($row = mysqli_fetch_array($t))
                {
                        //Inputs new entry in array with key and array pair.
                        $array[$fetch->name][$tmpCount] = $row[$colCounter];
                        //Increment to get to next index.
                        $tmpCount++;
                }
                //Reset the fetch to preventt hitting NULL.
                mysqli_data_seek($t, 0);
                //Increment to net column for next loop.
                $colCounter++;
        }
        //Return array to php so it can be viewed in the browser
        return $array;
}
