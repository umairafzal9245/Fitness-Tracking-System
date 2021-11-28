




<html>
<head>
<title>PRE-BUILT PLAN</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:lightblue;">

<?
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
  else{die("connection not successful");}

  echo "<h1 style='color:darkblue;font-size:40px;text-align:center;font-family:verdana' >PRE-BUILT PLANS</h1>  ";
  echo "<br><hr>";

  $sql = "select plan_id, type, purpose, duration from PLAN";

  $query_id = oci_parse($con, $sql); 		
  $r = oci_execute($query_id); 
 
  

        if($r)
        {
         // $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
         //echo "yes";
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

<br> 
<br>    
<br>
<br>
<br> 
<br>    
<br>
<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >CHOOSE A PRE-BUILT PLAN</h1>  
<br><hr>

<div align="center">
<form action="already_plan.php" method="post" style="float:middle;">
<p style="color:darkblue;font-size:15px;font-family:verdana">ENTER PLAN ID  &nbsp&nbsp&nbsp   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp&nbsp&nbsp <input type="text" name="plan_id"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">ENTER YOUR USERNAME AGAIN  <input type="text" name="username"  size="30" style="height:30px;font-size:14pt"/></p>


<button name="subject" type="submit" value="sign up"  style="background-color:darkblue;color:white;height:30px;width:90px;">SIGN UP</button> 
</form>
</div>
 <?


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
  else{die("connection not successful");}

 $username = $_POST["username"];

 $plan_id =$_POST["plan_id"];

  
 $query = "update member set plan_id=".$plan_id." WHERE username ='".$username."'";
  echo $query;


            $query_id = oci_parse($con, $query); 		
            $u = oci_execute($query_id); 
   
            if($u)
            {
 echo "insertion updation in member done";
            }else echo "naaaaaa";
         
        }

   
 ?>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <a href="choose_options.php"><button name="subject" type="submit" value="next" style="background-color:darkblue;align:middle;height:50px;width:210px;color:white">Next</button> 

</body>
</html>



