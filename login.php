




<html>
<head>
<title>LOGIN</title>

</head>

<body style="background-color:lightblue;">


<image src="wall2.jpg"  height="1000" align="right" hspace="0">
<br> 
<br>    
<br>
<br>
<br> 
<br>    
<br>
<br>
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >LOGIN</h1>  
<br><hr>

<div align="center">
<form action="login.php" method="post" style="float:middle;">
<p style="color:darkblue;font-size:15px;font-family:verdana">USERNAME  <input type="text" name="username"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">PASSWORD  <input type="password" name="password"  size="30" style="height:30px;font-size:14pt "/></p>


<button name="subject" type="submit" value="sign up"  style="background-color:darkblue;color:white;height:30px;width:90px;">CONFIRM</button> 
</form>
</div>


 <!--jjjjjj-->

<?php

if($_POST){
$password = $_POST['password'];
$username = $_POST['username'];
// example 2.1 ..creating a database connection
$db_sid = " (DESCRIPTION =
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
//	echo "connection successful.";
}
else
{
	die('Could not connect: ');
}

$sqll = "select password as pw from MEMBER where username='".$_POST["username"]."'";
    $query_id = oci_parse($con, $sqll); 		
    $s = oci_execute($query_id); 

    if($s){
 
     $pw = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
 //echo $password; echo $pw["PW"];
    if($password == $pw["PW"])
    {
      
     echo "&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <a href='choose_options.php'><button name='subject' type='submit' value='next' style='background-color:darkblue;height:50px;width:210px;color:white'>Next</button> ";

    }
    else
    {
     echo "   <h1 style='color:darkred;font-size:40px;text-align:center;font-family:verdana' >Try Again!</h1>  ";

    }
//$q="insert into plan values( ".$_POST["empno"]." ,'".$_POST["ename"]."', '".$_POST["job"]."' , ".$_POST["mgr"].",TO_DATE('".$_POST["hiredate"]."', 'yyyy/mm/dd'),".$_POST["sal"].",".$_POST["comm"].",".$_POST["deptno"].")";
    // echo $q;


    }
}



?>




</body>
</html>



