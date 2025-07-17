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

if ($_SESSION['username'] == $username){
    if ($_SESSION['email'] == $email){
        $sql0 = "UPDATE registeredusers SET name='$name', password='$password' where username = '$username'";
        if ($conn->query($sql0) === TRUE) {
            $_SESSION['name'] = $name;
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
if ($_SESSION['email'] == $email){
    if ($_SESSION['username'] == $username){
        $sql0 = "UPDATE registeredusers SET name='$name', password='$password' where username = '$username'";
        if ($conn->query($sql0) === TRUE) {
            $_SESSION['name'] = $name;
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
$uname = $_SESSION['username'];
$sql0 = "UPDATE registeredusers set username = '$username', email = '$email', name = '$name', password = '$password' where username = '$uname'";
if ($conn->query($sql0) === TRUE) {
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    echo "success";
    exit();
} 
else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
    exit();
}
    
$conn->close();
?>