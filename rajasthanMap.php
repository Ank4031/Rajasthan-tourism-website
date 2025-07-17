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
        .center{
            display: grid;
            place-content: center;
            justify-content: center;
        }
        .info{
            margin-top: 50px;
            text-align: center;
        }
        h1{
            background-color: whitesmoke;
            font-size: 50px;
            font-family: system-ui;
            box-shadow: 10px 10px 10px black;
        }
        iframe{
            box-shadow: 10px 10px 5px black;
            width: 1000px;
            height: 500px;
        }
        iframe:hover{
            box-shadow: 20px 20px 15px black;
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
    <div class="center">
        <div class="info">
            <h1>Rajasthan Map</h1>
        </div><br>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652225.8017124156!2d73.8783471!3d26.62840795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396a3efaf7e30e37%3A0xb52b9b4506c088e5!2sRajasthan!5e0!3m2!1sen!2sin!4v1748222715727!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>