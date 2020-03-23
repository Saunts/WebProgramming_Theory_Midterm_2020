<html>
<?php
	session_start();
		include("../model/databasecon.php");
		include("../controller/config.php");
		$db = new database();
		
		$id = $_SESSION['userid'];
		$username = $_SESSION['username'];
        $FirstName= mysqli_real_escape_string($conn, $_POST['FirstName']);
        $LastName= mysqli_real_escape_string($conn, $_POST['LastName']);
		$desc= mysqli_real_escape_string($conn, $_POST['desc']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
        if(!isset($password) || trim($password) == '')
			{
				
				$db->query("update userprofile set firstname='$FirstName', lastname='$LastName', description='$desc' where userid = $id;");
		
			}
		else{
			
			$password = md5($password);
			$db->query("update userprofile set firstname='$FirstName', lastname='$LastName', description='$desc' where userid = $id;");
			$db->query("update datauser set password='$password' where user_id = '$username';");
		}
        
        
?>
<script>
        window.location.href = "../index.php";
</script>
</html>