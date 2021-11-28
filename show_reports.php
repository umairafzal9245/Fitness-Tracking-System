





<html>
<head>
<title>Daily Log</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:lightblue;">



<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >REPORTS</h1>  
<br><hr>




<?php




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

//echo "PLAN:<br>";
 $sql = "select plan_id, type, purpose, duration from PLAN";

 $query_id = oci_parse($con, $sql); 		
 $r = oci_execute($query_id); 

 
 if($r)
{
  //$emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
 //echo "yes";
 echo "<div class='container'>";
 echo "<h2>PLANS</h2>";
 echo "<table class='table table-bordered'>";
 echo " <thead>";
 echo "<tr>";
 echo "<th>PLAN ID</th>";
 echo " <th>TYPE</th>";
 echo " <th>PURPOSE</th>";
 echo "  <th>DURATION</th>";
 echo "   </tr>";
 echo " </thead>";
  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
   // echo "<font size='4' face='Arial'> id: " . $row["PLAN_ID"]. ",Type: '" . $row["TYPE"]. "',Purpose: '".$row["PURPOSE"]."',Duration: '" . $row["DURATION"]. "' <br>";
 
?>
 
      <tbody>
        <tr>
          <td><?echo $row["PLAN_ID"]?></td>
          <td><?echo $row["TYPE"]?></td>
          <td><?echo $row["PURPOSE"]?></td>
          <td><?echo $row["DURATION"]?></td>

        </tr>
       
      </tbody>
 
  <?
}
echo "</table>";
echo "</div>";
}
//echo "MEMBER:<br>";
 $sqll = "select * from MEMBER";

 $query_idd = oci_parse($con, $sqll); 		
 $rr = oci_execute($query_idd); 

 
 if($rr)
{
 // $emp = oci_fetch_array($query_idd, OCI_BOTH+OCI_RETURN_NULLS);    
 //echo "yes";

 echo "<div class='container'>";
 echo "<h2>MEMBERS</h2>";
 echo "<table class='table table-bordered'>";
 echo " <thead>";
 echo "<tr>";
 echo "<th>MEMBER ID</th>";
 echo " <th>USERNAME</th>";
 echo " <th>NAME</th>";
 echo "  <th>PLAN ID</th>";
 echo "  <th>AGE</th>";
 echo "  <th>WEIGHT</th>";
 echo "  <th>GENDER</th>";
 echo "  <th>BMI</th>";
 echo "  <th>PHONE NO</th>";
 echo "  <th>ADDRESS</th>";

 echo "   </tr>";
 echo " </thead>";
  while($row = oci_fetch_array($query_idd, OCI_BOTH+OCI_RETURN_NULLS)) {
   // echo "<font size='4' face='Arial'>" . $row["MEMBER_ID"]. ", '" . $row["USERNAME"]. "', '".$row["PASSWORD"]."', '" . $row["PLAN_ID"]."', '" . $row["NAME"]."','" . $row["AGE"]."', '" . $row["WEIGHT"]."', '" . $row["GENDER"]."','" . $row["PHONE_NO"]."', '" . $row["ADDRESS"]."', '" . $row["BMI"]. "' <br>";
  

    ?>
 
    <tbody>
      <tr>
        <td><?echo $row["MEMBER_ID"]?></td>
        <td><?echo $row["USERNAME"]?></td>
        <td><?echo $row["PLAN ID"]?></td>
        <td><?echo $row["NAME"]?></td>
        <td><?echo $row["PLAN ID"]?></td>
        <td><?echo $row["AGE"]?></td>
        <td><?echo $row["WEIGHT"]?></td>
        <td><?echo $row["GENDER"]?></td>
        <td><?echo $row["BMI"]?></td>
        <td><?echo $row["PHONE NO"]?></td>
        <td><?echo $row["ADDRESS"]?></td>

      </tr>
     
    </tbody>

<?
}
echo "</table>";
echo "</div>";
}




 //echo "daily log id done ";



///echo "DIET:<br>";
$sqlll = "select * from DIET";

$query_iddd = oci_parse($con, $sqlll); 		
$rrr = oci_execute($query_iddd); 


if($rrr)
{
 //$emp = oci_fetch_array($query_iddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";

echo "<div class='container'>";
 echo "<h2>DIETS</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>LOG NO</th>";
echo " <th>FOOD TYPE</th>";
echo " <th>FATS</th>";
echo "  <th>CARBOHYDRATES</th>";
echo "  <th>PROTEINS</th>";
echo "  <th>TOTAL CALORIES</th>";


echo "   </tr>";
echo " </thead>";
 while($row = oci_fetch_array($query_iddd, OCI_BOTH+OCI_RETURN_NULLS)) {
  // echo "<font size='4' face='Arial'>" . $row["LOG_NO"]. ", '" . $row["FOOD_TYPE"]. "', '".$row["FAT"]."', '" . $row["CARBOHYDRATE"]."', '" . $row["PROTEIN"]."','" . $row["TOTAL_CALORIES"].  "' <br>";
   ?>
 
   <tbody>
     <tr>
       <td><?echo $row["LOG_NO"]?></td>
       <td><?echo $row["FOOD_TYPE"]?></td>
       <td><?echo $row["FAT"]?></td>
       <td><?echo $row["CARBOHYDRATE"]?></td>
       <td><?echo $row["PROTEIN"]?></td>
       <td><?echo $row["TOTAL_CALORIES"]?></td>


     </tr>
    
   </tbody>

<?
}
echo "</table>";
echo "</div>"; 


//echo "daily log id done ";




}

//echo "daily_log:<br>";

$sqllllllll = "select * from daily_log";

$query_idddddddd = oci_parse($con, $sqllllllll); 		
$rrrrrrrr = oci_execute($query_idddddddd); 


if($rrrrrrrr)
{
 //$emp = oci_fetch_array($query_idddddddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";


echo "<div class='container'>";
 echo "<h2>DAILY LOGS</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>LOG NO</th>";

echo " <th>MEMBER ID</th>";
echo "  <th>DATE</th>";



echo "   </tr>";
echo " </thead>";
 while($row = oci_fetch_array($query_idddddddd, OCI_BOTH+OCI_RETURN_NULLS)) {
    ?>
 
    <tbody>
      <tr>
        <td><?echo $row["LOG_NO"]?></td>
        <td><?echo $row["MEMBER_ID"]?></td>
        <td><?echo $row["C_DATE"]?></td>

 
 
 
      </tr>
     
    </tbody>
 
 <?
 }
 echo "</table>";
 echo "</div>"; 


//echo "daily log id done ";




}


$sqlllllll = "select * from NUTRITION";

$query_iddddddd = oci_parse($con, $sqlllllll); 		
$rrrrrrr = oci_execute($query_iddddddd); 


if($rrrrrrr)
{
 //$emp = oci_fetch_array($query_iddddddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";


echo "<div class='container'>";
 echo "<h2>DAILY LOGS</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>PLAN ID</th>";

echo " <th>VITAMIN_INTAKE</th>";

echo "  <th>FAT INTAKE</th>";
echo "  <th>CARBOHYDRATE INTAKE</th>";

echo "  <th>PROTEIN INTAKE</th>";
echo "  <th>TOTAL CALORIES</th>";


echo "   </tr>";
echo " </thead>";
 while($row = oci_fetch_array($query_iddddddd, OCI_BOTH+OCI_RETURN_NULLS)) {
 //  echo "<font size='4' face='Arial'>" . $row["PLAN_ID"]. ", '" . $row["VITAMIN_INTAKE"]. "', '".$row["FAT_INTAKE"]."', '" . $row["CARBOHYDRATE_INTAKE"]."', '" . $row["PROTEIN_INTAKE"]."', '" . $row["TOTAL_CALORIES"]."' <br>";

   ?>
 
   <tbody>
     <tr>
       <td><?echo $row["PLAN_ID"]?></td>
       <td><?echo $row["VITAMIN_INTAKE"]?></td>
       <td><?echo $row["FAT_INTAKE"]?></td>
       <td><?echo $row["CARBOHYDRATE_INTAKE"]?></td>
       <td><?echo $row["PROTEIN_INTAKE"]?></td>
       <td><?echo $row["TOTAL_CALORIES"]?></td>



     </tr>
    
   </tbody>

<?
}
echo "</table>";
echo "</div>";

//echo "daily log id done ";




}


//echo "MUSCLE:<br>";
$sqllll = "select * from MUSCLE";

$query_idddd = oci_parse($con, $sqllll); 		
$rrrr = oci_execute($query_idddd); 


if($rrrr)
{
 //$emp = oci_fetch_array($query_idddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";


echo "<div class='container'>";
 echo "<h2>MUSCLES</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>LOG NO</th>";
echo " <th>MUSCLE CHANGE</th>";
echo " <th>WEIGHT CHANGE</th>";
echo "  <th>BMI CHANGE</th>";



echo "   </tr>";
echo " </thead>";


 while($row = oci_fetch_array($query_idddd, OCI_BOTH+OCI_RETURN_NULLS)) {
  // echo "<font size='4' face='Arial'>" . $row["LOG_NO"]. ", '" . $row["MUSCLE_CHANGE"]. "', '".$row["WEIGHT_CHANGE"]."', '" . $row["BMI_CHANGE"]."' <br>";


   ?>
 
   <tbody>
     <tr>
       <td><?echo $row["LOG_NO"]?></td>
       <td><?echo $row["MUSCLE_CHANGE"]?></td>
       <td><?echo $row["WEIGHT_CHANGE"]?></td>
       <td><?echo $row["BMI_CHANGE"]?></td>



     </tr>
    
   </tbody>

<?
}
echo "</table>";
echo "</div>"; 




//echo "daily log id done ";




}

$sqlllll = "select * from workout";

$query_iddddd = oci_parse($con, $sqlllll); 		
$rrrrr = oci_execute($query_iddddd); 


if($rrrrr)
{
 //$emp = oci_fetch_array($query_iddddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";


echo "<div class='container'>";
 echo "<h2>WORKOUTS</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>WORKOUT ID</th>";
echo " <th>PLAN ID</th>";
echo " <th>TARGETED MUSCLES</th>";
echo "  <th>WORKOUT DAYS</th>";

echo "  <th>WORKOUT TIME</th>";



echo "   </tr>";
echo " </thead>";


 while($row = oci_fetch_array($query_iddddd, OCI_BOTH+OCI_RETURN_NULLS)) {
  // echo "<font size='4' face='Arial'>" . $row["WORKOUT_ID"]. ", '" . $row["PLAN_ID"]. "', '".$row["TARGETED_MUSCLES"]."', '" . $row["WORKOUT_DAYS"]."', '" . $row["WORKOUT_TIME"]."' <br>";
 

  ?>
 
  <tbody>
    <tr>
      <td><?echo $row["WORKOUT_ID"]?></td>
      <td><?echo $row["PLAN_ID"]?></td>
      <td><?echo $row["TARGETED_MUSCLES"]?></td>
      <td><?echo $row["WORKOUT_DAYS"]?></td>

      <td><?echo $row["WORKOUT_TIME"]?></td>



    </tr>
   
  </tbody>

<?
}
echo "</table>";
echo "</div>"; 

}

//echo "daily log id done ";







//echo "EXERCISE:<br>";

$sqllllll = "select * from exercise";

$query_idddddd = oci_parse($con, $sqllllll); 		
$rrrrrr = oci_execute($query_idddddd); 


if($rrrrrr)
{
// $emp = oci_fetch_array($query_idddddd, OCI_BOTH+OCI_RETURN_NULLS);    
//echo "yes";

echo "<div class='container'>";
 echo "<h2>EXERCISES</h2>";
 echo "<table class='table table-bordered'>";
echo " <thead>";
echo "<tr>";
echo "<th>WORKOUT ID</th>";
echo " <th>NAME</th>";
echo " <th>EQUIPMENT</th>";
echo "  <th>TOTAL REPS</th>";

echo "  <th>WORKOUT TIME</th>";



echo "   </tr>";
echo " </thead>";

 while($row = oci_fetch_array($query_idddddd, OCI_BOTH+OCI_RETURN_NULLS)) {
  // echo "<font size='4' face='Arial'>" . $row["WORKOUT_ID"]. ", '" . $row["NAME"]. "', '".$row["EQUIPMENT"]."', '" . $row["TOTAL_REPS"]."' <br>";
 

  ?>
 
  <tbody>
    <tr>
      <td><?echo $row["WORKOUT_ID"]?></td>
      <td><?echo $row["NAME"]?></td>
      <td><?echo $row["EQUIPMENT"]?></td>
      <td><?echo $row["TOTAL_REPS"]?></td>


    </tr>
   
  </tbody>

<?
}
echo "</table>";
echo "</div>"; 
 
}




?>


</body>
</html>


