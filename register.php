<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Fit Me!</title>
  </head>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: :border-box;
			
		}
		body{
			background-color: lightgray;
			
		}
		.row{
			background-color: white;
			border-radius: 30px;
			box-shadow: 12px 12px 22px grey;
		}
		.img{
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;
			height: 100%;
			width:95%;
		
			
		}
		.btn1{
			border: none;
			outline: :none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
			
			
		}
		.btn1:hover{
			background-color: white;
		
			border: 1px solid;
			color:dodgerblue;
		}
	.img {
}
    </style>
	 <script>

  function validateForm() {
  var x = document.forms["myForm"]["first"].value;
  if (x == "") {
    alert("first Name must be filled out");
    return false;
  }
   var y = document.forms["myForm"]["last"].value;
  if (y == "") {
    alert("last name  must be filled out");
    return false;
  }
  var z = document.forms["myForm"]["username"].value;
  if (z == "") {
    alert("Username  must be filled out");
    return false;
  }
  var a = document.forms["myForm"]["email"].value;
  if (a == "") {
    alert("Email must be filled out");
    return false;
  }
  var b = document.forms["myForm"]["password"].value;
  if (b == "") {
    alert("password must be filled out");
    return false;
  }
   var c = document.forms["myForm"]["dob"].value;
  if (c == "") {
    alert("Date of Birth must be filled out");
    return false;
  }
   var d = document.forms["myForm"]["height"].value;
  if (d == "") {
    alert("height must be filled out");
    return false;
  }
   var e = document.forms["myForm"]["weight"].value;
  if (e == "") {
    alert("weight must be filled out");
    return false;
  }

}

  </script>
<body>
    
	  
	  <section class="Form my-4 mx-5">
	  <div class="container">
		  <div class="row no-gutters">
		  <div class="col-lg-4">
		  <img src="./gym2.jpg"  class="img" alt="Responsive image">
		  
		  </div>
		  <div class="col-lg-7 px-5 pt-5">
			  <h1 class="font-weight-bold py-3">Register</h1>
			  <h4>Create your Account</h4>
			  <form method="post" action="" name="myForm" onsubmit="return validateForm()">
			  <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="First Name" name="first" class="form-control my-3 p-4">
				  
				  <input type="text" placeholder="Last Name" name="last" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" step="0.01" placeholder="Username" name="username" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
			    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="email" placeholder="Email-Address" name="email" class="form-control my-3 p-4">
				  
				  
				  </div>
			    </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="password" placeholder="******" name="password" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				  
					    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="date" placeholder="Date of Birth" value=""  name="dob" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				  
				  
				  </div>
				 
				     <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="number" step="0.01" placeholder="height" name="height" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="number" step="0.01" placeholder="weight" name="weight" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				  
				   <div class="form-row">
				  <div class ="col-lg-7">
					  <input type="submit" name="submit1" class="btn1 mt-3 mb-5" value="Register"/>
				  
				  
				  
				  
				  </div>
				 
				  
				  </div>
				  
				   
				  
				  <p>Already have a account ? <a href="./login.php">Click here!</a></p>
			  
			  
			  </form>
				
		  
		  </div>
		  
		  </div>
	  </div>
	  
	  
	  
	  
	  
	  
	  </section>
	  
	  
	  
	  


  </body>
</html>
<?php
session_start();
 $db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-KQAM5SS)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = haroon)
    )
    )
";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "system";   // Oracle username e.g "scott"
   $db_pass = "123456";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; 
		} 
   else 
      { die('Could not connect to Oracle: '); } 


if(isset($_POST["submit1"]))
{
$first= $_POST['first'];
	$last= $_POST['last'];
	$email= $_POST['email'];
	$username= $_POST['username'];
	$password= $_POST['password'];
	$dob= $_POST['dob'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	
	$q ="insert into Proj_Member values(mem_id_sequence.NextVal,TO_DATE('$dob','YYYY-MM-DD'),'$first','$last')";
	$query_id = oci_parse($con, $q); 		
	$r = oci_execute($query_id); 
		
	
	
		$q="select MEM_ID from proj_member where fname='$first' and BIRTH_DATE=TO_DATE('$dob','YYYY-MM-DD')";
		$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
	
	  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$id = $row["MEM_ID"];
			
			

		  } 
	
	
	
	
		$q ="insert into Proj_credentials values('$email','$username','$password',TO_DATE(sysdate,'YYYY-MM-DD'),'$id')";
	$query_id = oci_parse($con, $q); 		
	$r = oci_execute($query_id); 
		
	
		$q ="insert into Proj_bodydata values('$id',mem_body_sequence.NextVal,'$height','$weight',TO_DATE(sysdate,'YYYY-MM-DD'),'','','','')";
	$query_id = oci_parse($con, $q); 		
	$r = oci_execute($query_id); 
		
	


	
	
	
	
	
}








?>