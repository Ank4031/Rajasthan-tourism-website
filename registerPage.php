<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: monospace;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            background:
                repeating-linear-gradient(
                    45deg,
                    rgba(255, 255, 255, 0.1),
                    rgba(255, 255, 255, 0.1) 2px,
                    transparent 70px,
                    transparent 30px
                ),
                radial-gradient(circle at bottom right, #2389ff 41%, #1200aa 112%);
        }
        nav{
            margin-top: 20px;
            border-radius: 40px;
            font-size: 2.2rem;
            width: 100%;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
        }
        /* linear-gradient(128deg, #61ff71, #235031, #083204 100%); */
        .containerRegister{
            border-radius: 27px;
            background: #f5f5f5a1;
            padding: 20px;
            margin-top: 90px;
            box-shadow: -10px 10px 25px 2px rgb(0, 0, 0);
        }
        li{
            text-align: center;
            margin-left: 4%;
            margin-right: 4%;
            width: 150px;
            height: 100%;
        }
        a{
            font-family: "Caveat", cursive;
            border-radius: 20px;
            text-decoration: none;
            color: #000000;
            width: 100%;
            height: 100%;
            transition: 0.5s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        a:hover{
            /* background-color: black; */
            color: white;
            font-size: 2.8rem;
            text-decoration: underline;
        }
        table{
            margin-left: 20px;
            min-width: 550px;
            min-height: 300px;
        }
        h1{
            color: rgb(0, 0, 0);
            display: block;
            text-align: center;
            font-size: 1.9rem;
        }
        input{
            border: none;
            width:80%;
            height: 30px;
            border-radius: 20px;
            padding-left: 10px;
            transition: 0.5s;
        }
        input:hover{
            box-shadow: -5px 5px 7px #000000;
        }
        #label{
            width:120px;
            color: rgb(0, 0, 0);
        }
        td{
            border: 2px none wheat;
            font-size: 1.3rem;
        }
        #button{
            text-align: center;
        }
        button{
            font-family: monospace;
            font-weight: bold;
            background-color: rgb(0, 0, 0);
            border-radius: 20px;
            border: none;
            width: 90px;
            height: 40px;
            font-size: 1.16rem;
            color: white;
            transition: 0.5s;
        }
        button:hover{
            background-color: white;
            color: black;
            box-shadow: -10px 10px 15px 2px rgb(0, 0, 0);
        }
        #message h2{
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="rajasthanMap.php">Map</a></li>
        <?php if (!(isset($_SESSION["role"]))):?>
            <li><a href="registerPage.php">Register</a></li>
        <?php endif;?>
        <?php if (!(isset($_SESSION["role"]))):?>
            <li><a href="loginPage.php">Login</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 'admin'):?>
            <li><a href="Admin.php">Admin</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"])):?>
            <li><a href="Profile.php">Profile</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"])):?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif;?>
    </nav>
    <br>
    <br>
    <div class="containerRegister">
        <form id="registerform" action="register.php" method="POST">
            <h1>Registration Form</h1>
            <table>
                <tr><td id="label">Name</td><td><input id="name" type="text" placeholder="Name..." name="name" required></td></tr>
                <tr><td id="label">Username</td><td><input id="username" type="text" placeholder="Enter Username..." name="username" required></td></tr>
                <tr><td id="label">Email</td><td><input id="email" type="email" placeholder="Email..." name="email" required></td></tr>
                <tr><td id="label">Password</td><td><input id="password" type="password" placeholder="Create Password..." name="password" required></td></tr>
                <tr><td id="label">Confirm</td><td><input id="cnf_Password" type="password" placeholder="Confirm Password..." name="confirm_Password" required></td></tr>
                <tr><td colspan="2" id="button"><button>Submit</button></td></tr>
            </table>
            <div id="message"></div>
        </form>
    </div>
</body>
<script>
    let password = document.querySelectorAll("input")[3];
    let confirm_Password = document.querySelectorAll("input")[4];
    let button = document.querySelector("button")
    console.log(button);
    console.log(confirm_Password.value);
    console.log(password.value);

    function validate(){
        if(password.value !== confirm_Password.value){
            button.disabled = true;
            message.innerHTML = "<h2>Password do not match</h2>";
        }
        else if(password.value == "" && confirm_Password.value == ""){
            button.disabled = false;
            message.innerHTML = "";
        }
        else if(password.value.length < 8){
            button.disabled = true;
            message.innerHTML = "<h2>Password should be greater then 8 charcracters.</h2>";
        }
        else if(!(/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^a-zA-Z0-9])/.test(password.value))){
            if (!(/(?=.*[A-Z])/.test(password.value))){
                button.disabled = true;
                message.innerHTML = "<h2>Password must have a uppercase character.</h2>";
            }
            else if(!(/(?=.*\d)/.test(password.value))){
                button.disabled = true;
                message.innerHTML = "<h2>Password must have a number.</h2>";
            }
            else if(!(/(?=.*[a-z])/.test(password.value))){
                button.disabled = true;
                message.innerHTML = "<h2>Password must have a lowercase character.</h2>";
            }
            else if(!(/(?=.*[^a-zA-Z0-9])/.test(password.value))){
                button.disabled = true;
                message.innerHTML = "<h2>Password must have a special character.</h2>";
            }
        }
        else if(/(?=.*\s)/.test(password.value)){
            button.disabled = true;
            message.innerHTML = "<h2>Password must not have a space.</h2>";
        }
        else{
            button.disabled = false;
            message.innerHTML = "";
        }
    }
    
    confirm_Password.addEventListener("input",validate);
    password.addEventListener("input",validate);

    document.querySelector("#registerform").addEventListener("submit",check_reg);

    function check_reg(e){
        e.preventDefault();
        let name = document.querySelector("#name").value;
        let username = document.querySelector("#username").value;
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;
        fetch("register.php",{
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "name="+encodeURIComponent(name)+"&username="+encodeURIComponent(username)+"&email="+encodeURIComponent(email)+"&password="+encodeURIComponent(password)
        })
        .then((response)=>{
            console.log("we got response");
            return response.text();
        })
        .then((data)=>{
            console.log(data);
            if(data == "success"){
                window.location.href = "loginPage.php";
            }
            else if(data == "user_Error"){
                document.querySelector("#message").innerHTML = `<h2>Username already taken</h2>`;
            }
            else if(data == "email_Error"){
                document.querySelector("#message").innerHTML = `<h2>Email already taken</h2>`;
            }
        })
        .catch((error)=>{
            console.log(error);
        })
    }
</script>
</html>
