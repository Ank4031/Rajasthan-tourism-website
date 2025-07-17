<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "testdb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from registeredusers where username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pass = $row['password'];
        $name = $row['name'];
        $email = $row['email'];
        $uname = $row['username'];
        $role = $row['role'];
        if($pass == $password){
            $_SESSION["name"] = $name;
            $_SESSION["username"] = $uname;
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $role;
            if($role == "client"){
                echo "client";
                exit();
            }
            else{
                echo "admin";
                exit();
            }
        } 
        else{
            echo "pass_Error";
            exit();
        }
    } else {
        echo "user_Error";
        exit();
    }

    $conn->close();
?>