<?php
session_start();
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$old_username = $_POST['old_username'];
$old_email =  $_POST['old_email'];

$conn = new mysqli("localhost", "root", "", "testdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($old_username == $username){
    if ($old_email == $email){
        $sql0 = "UPDATE registeredusers SET name='$name', password='$password', role='$role' where username = '$old_username'";
        if ($conn->query($sql0) === TRUE) {
            echo "success";
            exit();
        } 
        else {
            echo "Error: " . $sql0 . "<br>" . $conn->error;
            exit();
        }
    }
    else{
        $sql0 = "SELECT * from registeredusers where email = '$email'";
        $result = $conn->query($sql0);
        if ($result->num_rows > 0) {
            echo "email_Error";
            exit();
        }
    }
}

if ($old_email == $email){
    if ($old_username == $username){
        $sql0 = "UPDATE registeredusers SET name='$name', password='$password', role='$role' where username = '$old_username'";
        if ($conn->query($sql0) === TRUE) {
            echo "success";
            exit();
        } 
        else {
            echo "Error: " . $sql0 . "<br>" . $conn->error;
            exit();
        }
    }
    else{
        $sql0 = "SELECT * from registeredusers where username = '$username'";
        $result = $conn->query($sql0);
        if ($result->num_rows > 0) {
            echo "user_Error";
            exit();
        }
    }
}

$sql0 = "UPDATE registeredusers set username = '$username', email = '$email', name = '$name', password = '$password', role='$role' where username = '$old_username'";
if ($conn->query($sql0) === TRUE) {
    echo "success";
    exit();
} 
else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
    exit();
}
    
$conn->close();
?>