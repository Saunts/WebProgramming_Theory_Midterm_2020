<body>
<html>
<?php
	session_start();
	include "../controller/config.php";
	include "../model/databasecon.php";
	
	$db = new database();
	
	if(isset($_POST['login'])){
		$uname = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if(empty($uname)){
			array_push($errors, "Username is required");
		}
		if(empty($password)){
			array_push($errors, "password is required");
		}

		if(count($errors)==0){
			$password = md5($password);

			$query = "SELECT * FROM datauser WHERE username='$uname' AND password='$password'";
			$result = mysqli_query($conn, $query);
			
			$resultarr = mysqli_fetch_array($result);

			if (mysqli_num_rows($result)) {
				$_SESSION['username'] = $uname;
				$uid = $db->query("SELECT userid from userprofile where username = '$uname';");
				$uid = $uid['userid'];
				$_SESSION['userid'] = intval($uid);
				$_SESSION['success'] = "Logged in successfully";
			}else{
				array_push($errors, "Wrong username/password combination. please try again.");
			}


		}
	}	
	
	echo '<script>
						window.location.href = "../index.php";
				</script>';
?>

</body>
</html>