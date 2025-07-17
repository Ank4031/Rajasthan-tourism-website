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
            background: radial-gradient(circle at bottom right, #2389ff 41%, #1200aa 112%);
        }
        nav{
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
            margin-left: 7%;
            margin-right: 7%;
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
            background-color: black;
            color: white;
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
            font-size: 1.7rem;
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
    </style>
</head>
<body>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="rajasthanMap.php">Map</a></li>
        <li><a href="registerPage.php">Register</a></li>
        <li><a href="loginPage.php">Login</a></li>
    </nav>
    <br>
    <br>
    <div class="containerRegister">
        <form id='loginform' action="login.php" method="POST">
            <h1>Login</h1>
            <table>
                <tr><td id="label">Username</td><td><input id="uname" type="text" placeholder="Enter Username..." name="username" required></td></tr>
                <tr><td id="label">Password</td><td><input id="password" type="password" placeholder="Create Password..." name="password" required></td></tr>
                <tr><td colspan="2" id="button"><button>Submit</button></td></tr>
            </table>
            <div id="message"></div>
        </form>
    </div>
</body>
<script>
    document.querySelector("#loginform").addEventListener("submit",check_Cred);

    function check_Cred(e){
        e.preventDefault();
        const uname = document.querySelector('#uname').value
        const password = document.querySelector('#password').value

        const login = fetch("login.php",{
            method:'POST',
            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body: "username="+encodeURIComponent(uname)+"&password="+encodeURIComponent(password)
        })
        login
        .then((responce)=>{
            return responce.text();
        })
        .then((data)=>{
            if(data == "sucess"){
                window.location.herf="homrpage.html"
            }
            else if(data = "pass_error"){
                document.querySelector("#message").innerText = data;
            }
            console.log(data);
        })
        .catch((error)=>{
            console.log(error);
        })
    }
    
</script>
</html>
