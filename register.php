<?php
session_start();
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "", "testdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql0 = "SELECT * from registeredusers where username = '$username' or email = '$email'";
$result = $conn->query($sql0);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($username == $row['username']){
        echo "user_Error";
        exit();
    }
    else{
        echo "email_Error";
        exit();
    }
    exit();
} else {
    $sql = "INSERT INTO registeredusers (name, username, email, password)
        VALUES ('$name','$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}
$conn->close();
?>