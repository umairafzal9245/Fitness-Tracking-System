




<html>
<head>
<title>Choose Plan</title>

</head>
<body style="background-color:lightblue;">

<image src="diet.png"  height="1500" width="1000" align="right" hspace="0">
<br> 
<br>    
<br>

<!--
<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >CHOOSE A PLAN ALREADY AVAILABLE</h1>  
<br><hr>
-->





<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >MAKE A PLAN</h1>  
<br><hr>

<div align="center">
<form action="choose_plan.php" method="post" style="float:middle;">
<p style="color:darkblue;font-size:15px;font-family:verdana" >DAYS(7/30/60/90)    &nbsp &nbsp   &nbsp  &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="days"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana" >TYPE(standard/new)  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp  &nbsp  &nbsp&nbsp <input type="text" name="type"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana" >PURPOSE(lose/gain/maintain) <input type="text" name="purpose"  size="30" style="height:30px;font-size:14pt"/></p>

<!--   DAYS, TYPE, PURPOSE -->
<h2 style="color:darkblue;font-size:25px;text-align:center;font-family:verdana" >NUTRITION SCHEDULE</h2> 
<p style="color:darkblue;font-size:15px;font-family:verdana" >VITAMIN-INTAKE  &nbsp&nbsp&nbsp  &nbsp  &nbsp  &nbsp&nbsp&nbsp <input type="text" name="vitamin-intake"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">FAT-INTAKE &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp  <input type="text" name="fat-intake"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">CARBOHYDRATE-INTAKE &nbsp  <input type="text" name="carbs-intake"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">PROTEIN-INTAKE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp <input type="text" name="protein-intake"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">TOTAL-CALORIES  &nbsp &nbsp&nbsp  &nbsp  &nbsp&nbsp &nbsp <input type="text" name="total-calories"  size="30" style="height:30px;font-size:14pt"/></p>

<h2 style="color:darkblue;font-size:25px;text-align:center;font-family:verdana" >WORKOUT SCHEDULE</h2> 

<p style="color:darkblue;font-size:15px;font-family:verdana">TARGETED-MUSCLES  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="targeted-muscles"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana">DAYS FOR WORKOUT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="days-for-workout"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">TIME FOR WORKOUT/DAY <input type="text" name="time-for-workout"  size="30" style="height:30px;font-size:14pt"/></p>

<h2 style="color:darkblue;font-size:25px;text-align:center;font-family:verdana" >EXERCISE SCHEDULE</h2> 

<p style="color:darkblue;font-size:15px;font-family:verdana">EXERCISE NAME  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp <input type="text" name="exercise"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">EQUIPMENT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp <input type="text" name="equipment"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">TOTAL REPS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp <input type="text" name="total-reps"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:18px;font-family:verdana">To confirm, enter your username <input type="text" name="username"  size="36" style="height:36px;font-size:15pt"/></p>


<button name="subject" type="submit" value="sign up"  style="background-color:darkblue;color:white;height:30px;width:150px;">MAKE PLAN</button> 
</form>
</div>
<?

if($_POST){
$duration = $_POST["days"];
$type = $_POST["type"];
$purpose = $_POST["purpose"];
$vit_intake = $_POST["vitamin-intake"];
$fat_intake = $_POST["fat-intake"];
$carbs_intake = $_POST["carbs-intake"];
$protein_intake = $_POST["protein-intake"];
$total_calories = $_POST["total-calories"];

$targeted_muscles = $_POST["targeted-muscles"] ;
$days_for_workout = $_POST["days-for-workout"];
$time_for_workout = $_POST["time=for-workout"];

$exercise_name = $_POST["exercise"];
$equipment = $_POST["equipment"];
$total_reps = $_POST["total-reps"];
$username = $_POST["username"];



 // example 2.1 ..creating a database connection
 $db_sid = "  (DESCRIPTION =
 (ADDRESS = (PROTOCOL = TCP)(HOST = WIN-4BIMB1BPCMQ)(PORT = 1521))
 (CONNECT_DATA =
   (SERVER = DEDICATED)
   (SERVICE_NAME = orcl)
 )
)";
 $db_user = "scott";
 $db_pass = "1234";
 $con = oci_connect($db_user,$db_pass,$db_sid);
 if($con)
 {
     echo "";

 }
 else{die("connection not successful 2nd time");}


$sql = "select COUNT(*) as total from PLAN";


    
     $query_id = oci_parse($con, $sql); 		
     $r = oci_execute($query_id); 
   
     
     if($r)
	 {
      //   echo " successful";
         $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
        $plan_id = $emp['TOTAL'] + 1;
       //echo "plan id done ";
        //echo $plan_id;


        $q = "insert into PLAN values( ".$plan_id.",'" .$type."','" .$purpose."', '".$duration."')";
//echo $q;

        $query_id = oci_parse($con, $q); 		
        $t = oci_execute($query_id); 

        if($t)
        {
          // echo "plan insertion done ";
   
           $query = "update member set plan_id=".$plan_id." WHERE username ='".$username."'";
  // echo $query;
           $query_id = oci_parse($con, $query); 		
           $s = oci_execute($query_id); 
   
           $qnut = "insert into NUTRITION values( ".$plan_id.",'" .$vit_intake."','" .$fat_intake."','".$carbs_intake."','".$protein_intake."','".$total_calories."')";
           //echo $qnut;
           $query_id = oci_parse($con, $qnut); 		
           $u = oci_execute($query_id);
           if($t)
           {
         //   echo "nutrition insertion done ";

            $sqlc = "select COUNT(*) as total from WORKOUT";


    
            $query_id = oci_parse($con, $sqlc); 		
            $r = oci_execute($query_id); 
          
            
            if($r)
            {
                $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
                $workout_id = $emp['TOTAL'] + 1;
          //     echo "workout id done ";
            //    echo $workout_id;

                $q = "insert into WORKOUT values( ".$workout_id."," .$plan_id.",'" .$targeted_muscles."', '".$days_for_workout."','".$time_for_workout."')";
             //   echo $q;
                
                        $query_id = oci_parse($con, $q); 		
                        $t = oci_execute($query_id); 
                
                        if($t)
                        {
                          //  echo "workout insertion done ";
                            $q = "insert into EXERCISE values( ".$workout_id.",'" .$exercise_name."','" .$equipment."', ".$total_reps.")";
                        //    echo $q;
                            
                                    $query_id = oci_parse($con, $q); 		
                                    $u = oci_execute($query_id);

                                   if($u){
                                         //   echo "exercise insertion done";

                                   }

                        }


           }
        
        }
        
        }


    }



       
   
     

     }
    

 




?>
<div align="center">
<!--<form action="reg2.php" method="get" style="float:middle;"-->
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="choose_options.php"><button name="subject" type="submit" value="next" style="background-color:darkblue;height:50px;width:210px;color:white">Register</button> 

</div>

</body>
</html>



