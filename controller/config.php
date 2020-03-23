<?php
$host = "localhost";
$user = "kuromyid_pemwebuts";
$pass = "123456";
$db = "kuromyid_pemwebuts";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
   die("Connection failed: ".$conn->connect_error);
}

?>