<?php
session_start();
include ('config.php');
include "../model/databasecon.php";

$db = new database();
$status = mysqli_real_escape_string($conn, $_POST['status']);
$userid = $_SESSION['userid'];
$db->newstatus($userid, $status);


?>

<html>
<body>
<script>
        window.location.href = "../index.php";
</script>
</body>
</html>
