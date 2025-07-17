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
            margin-bottom: 80px;
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
        a{
            font-family: "Caveat", cursive;
            border-radius: 20px;
            text-decoration: none;
            color: #000000;
            width: 100%;
            height: 100%;
            tdansition: 0.5s;
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
            color: white;
            font-size: 2rem;
        }
        .show_Data{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #show_Btn{
            width: 80px;
            height: 40px;
            border-radius: 25px;
            color: white;
            background: #281a83;
            font-size: 1.1rem;
            transition: 0.5s;
            font-family: monospace;
            font-weight: bold;
            border: none;
            box-shadow: -10px 6px 6px #022cc7;
        }
        #show_Btn:hover{
            background:white;
            color:black;
            box-shadow: -10px 6px 6px 0px black;
        }
        table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
        th{
            font-weight: bold;
            font-size: 1.2rem;
            background: #6597fd;
        }
        table {
            margin-top: 50px;
            width: 100%;
            background:white;
        }
        input{
            background: transparent;
            border: none;
            font-size: 1rem;
        }
        .btn{
            margin-top: 40px;
            width: 300px;
            display: flex;
            justify-content: space-evenly;
        }
        #save{
            margin-left: 4px;
            width: 80px;
            height: 40px;
            border-radius: 25px;
            color: white;
            background:rgb(106 179 253);
            font-size: 1.1rem;
            transition: 0.8s;
            font-family: monospace;
            font-weight: bold;
            border: none;
        }
        #save:hover{
            background:#022cc7;
            color:white;
            border:solid;
        }
        #edit{
            width: 80px;
            height: 40px;
            border-radius: 25px;
            color: white;
            background:rgb(106 179 253);
            font-size: 1.1rem;
            font-family: monospace;
            font-weight: bold;
            border: none;
            transition: 0.8s;
        }
        #edit:hover{
            background:#022cc7;
            color:white;
            border:solid;
        }
        .message h1{
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
    <h1>welcome <?php echo $_SESSION["name"]." you are an admin"?></h1>
    <h1>Dsplay data of all the users</h1>
    <div class="show_Data">
        <button id='show_Btn'>Show</button>
        <table>
            <thead>

            </thead>
            
            <tbody>

            </tbody>
        </table>
        <div class="message"></div>
    </div>
</body>
<!-- ================================================SCRIPT================================================================= -->
<script>

    // GET DATA FROM THE DATABASE
    document.querySelector("#show_Btn").addEventListener("click",read_Data);
    function read_Data(){
        document.querySelector("thead").innerHTML="";
        document.querySelector("thead").innerHTML="<th></th><th>Name</th><th>Username</th><th>Emial</th><th>Password</th><th>Role</th>";
        let table = document.querySelector("tbody");
        table.innerHTML="";
        fetch("getdata.php")
        .then((response)=>{
            return response.json();
        })
        .then((data)=>{
            data.forEach((user)=>{
                const row = `<tr>
                <td><button id="edit">Edit</button><button id="save" disabled>Save</button></td>
                <td><input value= "${user.name}" disabled></td>
                <td><input value= "${user.username}" disabled></td>
                <td><input value= "${user.email}" disabled></td>
                <td><input value= "${user.password}" disabled></td>
                <td><input value= "${user.role}" disabled></td>
                </tr>`
                table.innerHTML += row;
            });
        })
        .catch((error)=>{
            console.log(error);
        })
    }

    let editList = new Array();

    // TO ENABLE UPDATE ON THE DATA
    document.addEventListener("click",(e)=>{
        if (e.target.id == "edit"){
            const row = e.target.parentElement.parentElement;
            row.querySelectorAll("input").forEach(inp=>{
                editList.push(inp.value);
                inp.disabled=false;
                inp.style.background = "#96b0fe";
                inp.style.height = "35px";
                inp.style.borderRadius = "25px";
                inp.style.paddingLeft = "12px";
                inp.style.border = "solid";
            })
            row.querySelector("#save").disabled = false;
            console.log("data to edit ",editList);
            
        }
    })

    // SAVE AND CHECK THE DATA 
    document.addEventListener("click",(e)=>{
        if (e.target.id == "save"){
            const row = e.target.parentElement.parentElement;
            const lis = new Array();
            row.querySelectorAll("input").forEach(inp=>{
                lis.push(`${inp.value}`)
            })
            console.log(lis);

            fetch("adminUpdate.php",{
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "name="+encodeURIComponent(lis[0])+"&username="+encodeURIComponent(lis[1])+"&email="+encodeURIComponent(lis[2])+"&password="+encodeURIComponent(lis[3])+"&role="+encodeURIComponent(lis[4])+"&old_username="+encodeURIComponent(editList[1])+"&old_email="+encodeURIComponent(editList[2])
            })
            .then((response)=>{
                console.log("we got response");
                return response.text();
            })
            .then((data)=>{
                console.log(data);
                if(data == "success"){
                    document.querySelector(".message").innerHTML = `<h2>Updated Successfull</h2>`;
                    row.querySelector("#save").disabled = true;
                    editList = [];
                    row.querySelectorAll('input').forEach(el=>{
                        el.style.background="transparent";
                        el.style.border="None";
                        el.disabled="true";
                    })
                    
                }
                else if(data == "user_Error"){
                    console.log("got the error");
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
    })

</script>
</html>