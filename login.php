<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>KeyFit!</title>
  </head>
  <script>

  function validateForm() {
  var x = document.forms["myForm"]["email"].value;
  if (x == "") {
    alert("Email must be filled out");
    return false;
  }
   var y = document.forms["myForm"]["password"].value;
  if (y == "") {
    alert("Password must be filled out");
    return false;
  }

}

  </script>
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
		.img-fluid{
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;
			
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
			color:black;
		}
	</style>
  <body>
    
	  
	  <section class="Form my-4 mx-5">
	  <div class="container">
		  <div class="row no-gutters">
		  <div class="col-lg-5">
		  <img src="./gym.jpg" class="img-fluid" alt="">
		  
		  </div>
		  <div class="col-lg-7 px-5 pt-5">
			  <h1 class="font-weight-bold py-3">Login</h1>
			  <h4>Sign to your Account</h4>
			  <form method="post" action="" name="myForm" onsubmit="return validateForm()">
			  <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="email" placeholder="Email-Address"   name="email" class="form-control my-3 p-4">
				  
				  
				  </div> 
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="password" placeholder="******" name="password" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
					
				  
				    <div class="form-row">
				  <div class ="col-lg-7">
					  <input type="submit" name="submit1" class="btn1 mt-3 mb-5" value="Login"/>
				  
				  
				  
				  
				  </div>
				 
				  
				  </div>

				   </form>
		  


				  
				   <a href="#">Forgot Password?</a>
				  
				  <p>Don't have an account ? <a href="./register.php">Register here!</a></p>
			  
			  

		  </div>
		  
		  </div>
	  </div>
	  
	  
	  
	  
	  
	  
	  </section>
	  
	  
	  
	  


  </body>
</html>

<?php

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
$email=$_POST['email'];
$password=$_POST['password'];


	
	

		$q="select PASSWORD,MEM_ID from proj_credentials where email='$email'";
		$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);	
	while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$password1 = $row["PASSWORD"];
			$id=$row["MEM_ID"];
			

		  } 
	if(is_null($password1))
	{
		echo "Account not found";
	}
	else if($password==$password1)
	{
		echo"Login successful";
			session_start();

			echo 'Welcome to page #1';

					$_SESSION['id'] = $id;


// Works if session cookie was accepted
echo '<br /><a href="firstpage.php">page 2</a>';


header("Location:firstpage.php");
exit();
}


	else
	{
		echo "Wrong Password";
	}
	
	
	
}








?>















