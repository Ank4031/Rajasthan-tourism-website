<?php
session_start();
if (!(isset($_SESSION["role"])) || $_SESSION["role"] == 'client'){
    echo "YOU ARE NOT A VALID USER FOR THIS PAGE";
    exit();
}

$conn = new mysqli("localhost", "root", "", "testdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql0 = "SELECT * from registeredusers";
$result = $conn->query($sql0);

$user = [];

while ($row = $result->fetch_assoc()){
    $user[] = $row;
}
header('Content-Type: application/json');
echo json_encode($user);

exit();
$conn->close();
?>