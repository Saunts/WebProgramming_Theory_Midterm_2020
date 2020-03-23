<?php
session_start();
include ('config.php');
include "../model/databasecon.php";

$db = new database();
$statusid = mysqli_real_escape_string($conn, $_GET['id']);
$db->unfriend($_SESSION['userid'], $statusid);


?>

<html>
<body>
<script>
        window.location.href = "../index.php";
</script>
</body>
</html>
