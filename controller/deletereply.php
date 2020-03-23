<html>
<body>
<?php
session_start();
include ('config.php');
include "../model/databasecon.php";

$db = new database();
$statusid = intval(mysqli_real_escape_string($conn, $_GET['id']));
$db->deletereply($statusid);

echo '<script>
        window.location.href = "../view/replies.php?id='.$_SESSION['parentid'].'";
</script>';
?>


</body>
</html>
