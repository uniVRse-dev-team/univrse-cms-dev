<?php
$servername = "localhost:3306";
$username = "api";
$password = "Tm*9u0o5";
$dbname = "api";

//Variables submited by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['loginUser']) && isset($_POST['loginUser'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$loginUser = validate($_POST['loginUser']);
	$password = validate($_POST['password']);

	if (empty(trim($loginUser)) && (empty(trim($password)))){
		header("Location: loginform.php?error=Username and password are required.");
	    exit();
	} else if (empty(trim($loginUser))) {
		header("Location: loginform.php?error=Username is required.");
	    exit();
	}else if(empty(trim($password))){
        header("Location: loginform.php?error=Password is required.");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE name='$loginUser' AND password='$password';";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $loginUser && $row['password'] === $password) {
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: loginform.php?error=Wrong userame or password.");
		        exit();
			}
		}else{
			header("Location: loginform.php?error=Incorect username or password.");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}

mysqli_close();

?>