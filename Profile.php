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
            background: repeating-linear-gradient(45deg, rgb(255 255 255 / 0%), rgb(255 255 255 / 11%) 17px, transparent 70px, transparent 30px), radial-gradient(circle at bottom right, #2389ff 41%, #1200aa 112%);
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
        li{
            text-align: center;
            margin-left: 4%;
            margin-right: 4%;
            width: 150px;
            height: 100%;
        }
        li a{
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
        h1{
            text-align: center;
        }
        table{
            height: 250px;
            font-size: 1.5rem;
        }
        input{
            padding-left: 5px;
            border-radius: 10px;
            margin-left: 70px;
            height: 30px;
            background: transparent;
            border: none;
            font-size: 1.3rem;
            color: black;
            font-weight: bold;
            text-decoration-line: underline;
            width: 300px;
        }
        button{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-right: 30px;
            border-radius: 10px;
            border: none;
        }
        #button{
            text-align:center;
        }
        .profile_Info{
            margin-top: 100px;
            padding: 30px;
            background: #ffffff94;
            border-radius: 20px;
            box-shadow: -10px 10px 7px black;
            transition: 0.5s;
        }
        .profile_Info:hover{
            box-shadow: -10px 10px 25px 2px rgb(0, 0, 0);
        }
        .message h2{
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
    <div class="profile_Info">
        <h1>Profile Info</h1>
        <table>
            <tr><td>Name:</td><td><input id="name" type="text" required disabled></td></tr>
            <tr><td>User Name:</td><td><input id="uname" type="text" required disabled></td></tr>
            <tr><td>Email:</td><td><input id="email" type="email" required disabled></td></tr>
            <tr><td>Password:</td><td><input id="password" type="text" required disabled></td></tr>
            <tr><td colspan="2" id="button"><button id="edit">Edit</button><button id="save" disabled>Save</button></td></tr>
        </table>
        <div class="message"></div>
    </div>
</body>
<!-- =======================================================script====================================================================== -->
<script>
    let profile = document.querySelector(".profile_Info");
    fetch("getProfile.php",{
        method:'POST',
        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body: "username="+encodeURIComponent("<?php echo $_SESSION['username']?>")
    })
    .then(response => response.json())
    .then(data=>{
        console.log(data);
        document.querySelector("#name").value = data[0].name;
        document.querySelector("#uname").value = data[0].username;
        document.querySelector("#email").value = data[0].email;
        document.querySelector("#password").value = data[0].password;
    })
    .catch(error=>{
        console.log(error);
        
    });
    // ENABLE EDITING IN THE USER DATA
    document.querySelector('#edit').addEventListener("click",()=>{
        document.querySelectorAll('input').forEach(el=>{
            el.disabled = false;
            el.style.background="white";
        })
        document.querySelector("#save").disabled = false;
    })

    let password = document.querySelector("#password");
    let button = document.querySelector("#save")
    let message = document.querySelector(".message");
    console.log(button);
    
    // VALIDATES THE PASSWORD POLICIES
    function validate(){
        console.log(password.value);
        if(password.value.length < 8){
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
    
    password.addEventListener("input",validate);
    button.addEventListener("click",check_update);

    // UPDATE AND UPDATE CHECK
    function check_update(e){
        e.preventDefault();
        let name = document.querySelector("#name").value;
        let username = document.querySelector("#uname").value;
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;
         
        fetch("updateProfile.php",{
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
                document.querySelector(".message").innerHTML = `<h2>Updated Successfull</h2>`;
                this.disabled = true;
                document.querySelectorAll('input').forEach(el=>{
                    el.disabled = true;
                    el.style.background="transparent";
                })
            }
            else if(data == "user_Error"){
                document.querySelector(".message").innerHTML = `<h2>Username already taken</h2>`;
            }
            else if(data == "email_Error"){
                document.querySelector(".message").innerHTML = `<h2>Email already taken</h2>`;
            }
        })
        .catch((error)=>{
            console.log(error);
        })
    }

</script>
</html>