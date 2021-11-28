




<html>
<head>
<title>Registration FORM</title>

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
<h1 style="color:darkblue;font-size:40px;text-align:center;font-family:verdana" >REGISTRATION FORM</h1>  
<br><hr>

<div align="center">
<form action="reg2.php" method="post" style="float:middle;">
<p style="color:darkblue;font-size:15px;font-family:verdana">NAME  &nbsp&nbsp&nbsp  &nbsp  &nbsp &nbsp &nbsp&nbsp&nbsp <input type="text" name="name"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">USERNAME  &nbsp  &nbsp&nbsp &nbsp  <input type="text" name="username"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">PASSWORD   &nbsp   &nbsp&nbsp&nbsp <input type="password" name="password"  size="30" style="height:30px;font-size:14pt "/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">GENDER(m/f)    &nbsp&nbsp&nbsp  <input type="text" name="gender"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">AGE &nbsp &nbsp &nbsp  &nbsp   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp <input type="text" name="age"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">WEIGHT  &nbsp &nbsp&nbsp  &nbsp  &nbsp&nbsp &nbsp <input type="text" name="weight"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">PHONE NUMBER  <input type="text" name="phone_no"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">ADDRESS   &nbsp&nbsp&nbsp&nbsp  &nbsp  &nbsp <input type="text" name="address"  size="30" style="height:30px;font-size:14pt"/></p>
<p style="color:darkblue;font-size:15px;font-family:verdana">BMI  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp <input type="text" name="bmi"  size="30" style="height:30px;font-size:14pt"/></p>


<button name="subject" type="submit" value="sign up"  style="background-color:darkblue;color:white;height:30px;width:90px;">SIGN UP</button> 
</form>
</div>
 <?
 if($_POST){
 $name = $_POST["name"];
 $username = $_POST["username"];
 $password = $_POST["password"];
 $gender = $_POST["gender"];
 $age=$_POST["age"];
 $weight = $_POST["weight"];
 $phone_no= $_POST["phone no"];
 $address = $_POST["address"];
 $bmi = $_POST["bmi"];
 $plan_id = 1;
 
 
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
       // echo "connection successful.";
 
    }
    else{die("connection not successful");}
    $sqll = "select COUNT(*) as total from MEMBER";
    $query_id = oci_parse($con, $sqll); 		
    $s = oci_execute($query_id); 
 if($s){
 
 
     $emp = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);    
     $member_id = $emp['TOTAL'] + 1;
     //echo "member count done ";
    // echo $member_id;
 
    $q = "insert into MEMBER values( ".$member_id.",'" .$username."','" .$password."', ".$plan_id.",'".$name."',".$age.",'".$gender."',".$weight.",'".$phone_no."','".$address."', ".$bmi." )";
//    echo $q;
    
            $query_id = oci_parse($con, $q); 		
            $u = oci_execute($query_id); 
   
            if($u)
            {
 //echo "insertion in member done";
            }else echo "naaaaaa";
         }
        }
 
 ?>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="choose_options.php"><button name="subject" type="submit" value="next" style="background-color:darkblue;align:middle;height:50px;width:210px;color:white">Next</button> 

</body>
</html>



