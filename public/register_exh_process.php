<?php

$servername = "localhost:3306";
$username = "api";
$password = "Tm*9u0o5";
$dbname = "api";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}



	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);
	$email = validate($_POST['email']);
	$contact_no = validate($_POST['contact_no']);
	$companyname = validate($_POST['companyname']);
	$jobposition = validate($_POST['jobposition']);
	
	function isContactValid($data) {
		if((strlen($data) > 9)){
			return "1";
		} else {
			return "0";
		}
	}
	
	if(isContactValid($contact_no) == 0){
		header("Location: register_exh.php?error=Invalid contact number.");
		exit();
	} else {
	

	    
   $sql_create = "INSERT INTO exhibitors(exh_fname,exh_lname,exh_email,exh_contact_no,exh_companyname,exh_jobposition) VALUES('$fname','$lname','$email',
   '$contact_no','$companyname','$jobposition');";		   		   
   $result = mysqli_query($conn, $sql_create);

   
   if($result){
	   header("Location: register_exh.php?success=Successfully registered.");
	   exit();
   } else {
	   header("Location: register_exh.php?error=Failed to register as exhibitor.");
	   exit();
   }
   
   }
			   
	

mysqli_close()
?>