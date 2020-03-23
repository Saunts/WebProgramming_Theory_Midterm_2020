<?php
	include "controller/config.php";
	include "model/databasecon.php";
	$db = new database();
	
	session_start();


	if(isset($_GET['logout'])){
		session_destroy();
		header("location: view/login.php");
	}
	
	if($_SESSION['username'] == null || !isset($_SESSION)  ){
		echo "<script>
				window.location.href='view/login.php';
				</script>";
	}
	
	if(isset($_SESSION['parentid'])) unset($_SESSION['parentid']);
	
	$profile = $db->getuserdata($_SESSION['userid']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/picture.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<style>
		body{
			margin:0px; 
			overflow-x:hidden; 
			overflow-y: scroll;
			background:#f0f0f5;
		}
		.navbar{
			width: 100%;
			height: 60px;
			background: #1da1f2;
			padding: 5px;
			border-bottom: 1px gray solid;
			position: relative;
			z-index: 2;
			box-shadow: 0px 1px 14px -4px black;
		}
		.coverImageHolder{
			width: 100%;
			padding: 0px;
			height: 400px;
			background: #eBeBe0;
		}
		.userOptionBar{
			height: 60px;
			background: white;
			width: 100%;
			padding: 10px;
			border-top: 1px #c7c7c7 solid;
			border-bottom: 1px #cacaca solid;
		}
		.userImage{
			height: 200px;
			width: 200px;
			background: white;
			border-radius: 50%;
			margin-top: -140px;
			margin-left: 50px;
			border: 2px #dcdcdc solid;
		}
		
		.spacer{
			height: 20px;
			width: 100%;
			
		}
	</style>
</head>
<body>
	<div class="navbar">
		<div class="container-fluid">
			<div class="col-md-4">
				<div class="logotext" style="color:white;"><a href="../index.php" style="color: inherit;"><strong>NotTwitter</strong></a></div>
			</div>
			<div class="col-md-2" style="color: white; text-align: center;" >
				<i class="fa fa-users" aria-hidden="true" style="font-size: 20px;"></i>
			</div>
			<div class="col-md-4" style="text-align: right;">
				<button class="btn btn-outline-dark" style="border-color: white;">
				<?php  if (isset($_SESSION['username'])) : ?>
					<a href="index.php?logout='1'" style="color: #f0f0f5;">logout</a>
				<?php endif ?>
				</button>
			</div>
				
		</div>
	</div>

	<div class="coverImageHolder" style="background-image: url('<?php echo $profile['cover']; ?>'); background-repeat: no-repeat; background-size: cover;">
		
	</div>

	<div class="userOptionBar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="userImage">
						<image src="<?php echo $profile['image'];?>" class="profile">
					</div>
				</div>
				<div class="col-md-1">
					<a href="#" style="color: inherit;"><strong>Home</strong></a>
				</div>
				<div class="col-md-1" style="color:black;">
					<a href="view/friendlist.php" style="color: inherit;">Friends</a>
				</div>
			</div>
		</div>
	</div>

	<div class="spacer"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4>
	    					<p><strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
	    				</h4>
						
						<?php 
							echo htmlspecialchars($profile['firstname']);
							echo htmlspecialchars($profile['lastname']);
							echo '<br><br>';
							echo htmlspecialchars($profile['description']);
						?>
						<br>
						<button class="btn btn-primary" style="color: white;">
									<a onClick="window.location='view/editprofile.php'" style="color: inherit;">Edit Profile</a>
								</button>
						<br>
						
					</div>
				</div>
				<div class="spacer"></div>
				

			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<form action="controller/post_status.php" method="POST">
							<textarea name="status" class="form-control" placeholder="What's hapenning?"></textarea>
							<button type="submit" class="btn btn-primary">Post</button><br>
						</form>
					</div>
				</div>
				<?php
				if($db->showstatus() == null){ 
						echo "No status yet";
					}
					else{
						foreach($db->showstatus() as $x) {
							$userid = $x['userid'];
							echo '<div class="card" padding="10px">';
							echo '<div class="card-title"><a href="view/user.php?id='.$userid.'">' . $x['firstname'] . '</a></div>';
							echo '<div class="card-body">' . $x['status'] . '</div>';
							if($_SESSION['userid'] == $userid){
								echo '<div col-md1><a href="controller/deletestatus.php?id='.$x['statusid'].'" onClick="return confirm (\'Are you sure?\')">Delete</a></div>';
							}
							echo '<div col-md1><a href="view/replies.php?id='.$x['statusid'].'">Show Comment</a></div>';
							echo '</div>';
									
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>