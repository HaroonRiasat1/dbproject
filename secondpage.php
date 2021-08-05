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
 
$id= $_SESSION['id']; 

$q="select fname,lname from proj_member where MEM_ID=$id";
		$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
	
	  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$fname = $row["FNAME"];
			$lname = $row["LNAME"];

			

		  }







?>

<html>
<title>Welcome  </title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


<style>
.btn1{
			border: none;
			outline: :none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
			align:center;
			
			
		}
		.btn1:hover{
			background-color: white;
			border: 1px solid;
			color:black;
		}
.curved-div {
  background:#20B2AA;
  color: #FFF;
  text-align: center;
}
.curved-div h1 {
  font-size: 6rem;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.curved-div p {
  font-size: 2rem;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}



</style>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>

<body>





<div class="curved-div">
 
<h1> Welcome <?Php echo  $fname. ' ' . $lname    ?> </h1>
  <p>
 Thank you for Joining Fit-Me .
  </p>
  <svg viewBox="0 0 1440 319">
    <path fill="#fff" fill-opacity="1" d="M0,32L48,80C96,128,192,224,288,224C384,224,480,128,576,90.7C672,53,768,75,864,96C960,117,1056,139,1152,149.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
</div>
<div>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
       <a href="./register.php">Registration Form</a>
    <a href="./login.php">Login Page</a>
    <a href="./firstpage.php">Select Created Plans</a>
	 <a href="./secondpage.php"> Create Plan</a>
	<a href="./pagesix.php">Enter Exercise</a>
    <a href="./pageseven.php">Enter NUTRITION</a>
    <a href="./pagethree.php">Enter Daily data</a>
    <a href="./pagefive.php">Check Progress</a>
    <a href="./pageeight.php">Check Exercise</a>
    <a href="./pagenine.php">Check NUTRITION</a>
    <a href="./pageten.php">SEARCH</a>
  </div>
</div>
</div>

<h1>Please enter details to create Plans for you</h1>
	  <form method="post" action="" name="myForm" onsubmit="return validateForm()">
			  <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Muscle Group"   name="muscle" class="form-control my-3 p-4">
				  
				  
				  </div> 
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Exercise Name" name="exercisename" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Exercise Description" name="exdep" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Equipment" name="equip" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				   <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Daily Time" name="time" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>




				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Progress" name="progress" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>
				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="number" placeholder="Duration" name="duration" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>

				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Nutrition Name" name="nutritionname" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>


				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Nutrition Description" name="nutritiondesc" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>

				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Daily Nutrition allowance in cl" name="allowance" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>

				    <div class="form-row">
				  <div class ="col-lg-7">
				  
				  <input type="text" placeholder="Daily Intake in cl" name="intake" class="form-control my-3 p-4">
				  
				  
				  </div>
				  
				  
				  </div>

					
				  
				    <div class="form-row">
				  <div class ="col-lg-7">
					  <input type="submit" name="submit" class="btn1 mt-3 mb-5" value="CreatePLAN"/>
				  
				  
				  
				  
				  </div>
				 
				  
				  </div>

				   </form>
		  
<div>

<?php

if(isset($_POST["submit"]))
{
$muscle=$_POST["muscle"];
$exercisename=$_POST["exercisename"];
$exdep=$_POST["exdep"];
$progress=$_POST["progress"];
$nutritionname=$_POST["nutritionname"];
$nutritiondesc=$_POST["nutritiondesc"];
$allowance=$_POST["allowance"];
$intake=$_POST["intake"];
$equip=$_POST["equip"];
$time=$_POST["time"];
$duration=$_POST["duration"];

$q="insert into proj_muscle values(mus.NEXTVAL,'$muscle')";
$query_id = oci_parse($con, $q); 		
$r = oci_execute($query_id);




$q="insert into proj_exercise values(ex.NEXTVAL,'$time','$exercisename','$exdep','$equip','')";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);

$q="select EXERCISE_ID,NAME from proj_exercise where  name='$exercisename'";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
		  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	if($row["NAME"]==$exercisename)
			$exid = $row["EXERCISE_ID"];
			

		  } 

$q="select MUSCLE_ID from proj_MUSCLE where  name='$muscle'";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
		  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$mid = $row["MUSCLE_ID"];
			

		  }

$q="insert into proj_muscleexercise values($exid,$mid)";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);






$q="insert into proj_nutrition values(nut.NEXTVAL,'$nutritionname','$nutritiondesc','$allowance','$intake','')";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);


$q="insert into proj_plan values(planno.NEXTVAL,'$duration')";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);

$q="select PLAN_ID from proj_plan order by plan_id";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
		  while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$plan = $row["PLAN_ID"];
			
		

		  } 





$q="insert into proj_Demands values('$plan',pd.NEXTVAL,'$exid','0','$progress')";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);



$q="select NUTRITION_ID from proj_nutrition where name='$nutritionname'";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);
while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	
			$nid = $row["NUTRITION_ID"];
			

		  } 


$q="insert into Proj_requires values('$plan',PR.NEXTVAL,'$nid','$progress')";
$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id);





}
?>

</div>

<div>











</div>









</body>
</html>





