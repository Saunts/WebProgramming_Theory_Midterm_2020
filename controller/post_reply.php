<html>
<body>
<?php
session_start();
include ('config.php');
include "../model/databasecon.php";

$db = new database();
$status = mysqli_real_escape_string($conn, $_POST['reply']);
$userid = $_SESSION['userid'];
$parentid = intval($_SESSION['parentid']);
$db->newreply($parentid, $userid, $status);


echo '<script>
        window.location.href = "../view/replies.php?id='.$parentid.'";
</script>';

?>



</body>
</html>
