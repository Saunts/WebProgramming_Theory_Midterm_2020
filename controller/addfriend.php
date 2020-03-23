<?php
session_start();
include ('config.php');
include "../model/databasecon.php";
$db = new database();

$userid = mysqli_real_escape_string($conn, $_SESSION['userid']);
$friendid = mysqli_real_escape_string($conn, $_GET['id']);


$db->friend($userid, $friendid);

?>

<html>
<body>
<script>
        window.location.href = "../index.php";
</script>
</body>
</html>
