




<html>
<head>
<title>Daily Log</title>

</head>
<body style="background-color:lightblue;">


<image src="log.png"  height="1000" width="1200" align="right" hspace="0">
<br> 
<br>    
<br>

<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >DAILY_LOG</h1>  
<br><hr>

<div align="center">
<form action="daily_log.php" method="post" style="float:middle;">


<!--   DAYS, TYPE, PURPOSE -->
<h2 style="color:darkblue;font-size:25px;text-align:center;font-family:verdana" >MUSCLES</h2> 
<p style="color:darkblue;font-size:15px;font-family:verdana">DATE &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="text" name="date"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana">MUSCLE CHANGE &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="text" name="muscle"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">WEIGHT CHANGE &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp &nbsp<input type="text" name="weight"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">BMI CHANGE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp <input type="text" name="bmi_change"  size="30" style="height:30px;font-size:14pt"/></p>

<h2 style="color:darkblue;font-size:25px;text-align:center;font-family:verdana" >DIET</h2> 

<p style="color:darkblue;font-size:15px;font-family:verdana">FOOD TYPE  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="food_type"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana">FAT CONSUMED &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="fat_consumed"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">CARBS CONSUMED &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<input type="text" name="carbs_consumed"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">PROTEINS CONSUMED  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="proteins_consumed"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:15px;font-family:verdana">VITAMINS CONSUMED &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="vitmains_consumed"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">TOTAL CALRIES CONSUMED <input type="text" name="total_calories_consumed"  size="30" style="height:30px;font-size:14pt"/></p>

<p style="color:darkblue;font-size:18px;font-family:verdana">To confirm, enter your username again &nbsp  &nbsp&nbsp &nbsp  <input type="text" name="username"  size="36" style="height:36px;font-size:15pt"/></p>


<button name="subject" type="submit" value="submit"  style="background-color:darkblue;color:white;height:30px;width:90px;">SUBMIT</button> 

</div>




<?php

$date = $_POST["date"] ;
$msucle = $_POST["muscle"];
$weight = $_POST["weight"];
$bmi_change = $_POST["bmi_change"];
$food_type = $_POST["food_type"];
$fat = $_POST["fat_consumed"];
$carbs = $_POST["carbs_consumed"];
$proteins = $_POST["proteins_consumed"];
$vitamins = $_POST["vitamins_consumed"];
$total_calories = $_POST["total_calories_consumed"];
$username = $_POST["username"];



if($_POST){

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


 $sql = "select COUNT(*) as total from DAILY_LOG";

 $query_id = oci_parse($con, $sql); 		
 $r = oci_execute($query_id); 

 
 if($r)
{
  $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
  $log_id = $emp['TOTAL'] + 1;
 //echo "daily log id done ";
// echo $plan_id;

 $sql = "select COUNT(*) as total from DAILY_LOG";

 $query_id = oci_parse($con, $sql); 		
 $o = oci_execute($query_id); 

 
 if($o)
 {
  $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
  $member_id = $emp['TOTAL'];
  

  $q = "insert into DAILY_LOG values( ".$log_id."," .$member_id.",'" .$date."')";
  //echo $q;
  
          $query_id = oci_parse($con, $q); 		
          $t = oci_execute($query_id); 
  
          if($t)
          {
             //   echo "insertion in daily log done";
                $q = "insert into muscle values( ".$log_id.",'" .$msucle."', '".$weight."',".$bmi_change.")";
             //   echo $q;
                
                        $query_id = oci_parse($con, $q); 		
                        $t = oci_execute($query_id); 
                
                        if($t)
                        {
                          //echo "insertion in muscle done";
                          $q = "insert into diet values( ".$log_id.",'" .$food_type."', '".$fat."','".$carbs."', '".$proteins."','".$total_calories."')";
                        //  echo $q;
                          
                                  $query_id = oci_parse($con, $q); 		
                                  $t = oci_execute($query_id); 
                          
                                  if($t){

                                  //  echo "insertion in diet done";

                                  }


                        }

          }

 }



}
}


?>
<div align="center">
<!--<form action="reg2.php" method="get" style="float:middle;"-->
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="choose_options.php"><button name="subject" type="submit" value="next" style="background-color:darkblue;height:50px;width:210px;color:white">Register</button> 

</div>

</body>
</html>



