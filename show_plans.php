





<html>
<head>
<title>Daily Log</title>

</head>
<body style="background-color:lightblue;">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<br> 
<br>    
<br>

<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >AVAILABLE PLANS</h1>  
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


 $sql = "select plan_id, type, purpose, duration from PLAN";

 $query_id = oci_parse($con, $sql); 		
 $r = oci_execute($query_id); 

 
 if($r)
{
  echo "<div class='container'>";

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
 

 //echo "daily log id done ";




}



?>


</body>
</html>


