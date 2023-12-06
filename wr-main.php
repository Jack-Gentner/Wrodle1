<!DOCTYPE html>
<html lang="en">
    <?php session_start();?>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <meta charset="UTF-8">
        <title> Game </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            function gameSetup(){
                window.location.href ="./wr-setup.php";
            }
        </script>

    </head>
    <body>
        <style>
            <?php include "Design.css" ?>
        </style>
        <div class="navbar">
            <a href="./wr-main.php"><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="./Account.php"><i class="fas fa-cog"></i></a>
            <!-- Welcome Header -->
            <h1 class="header">Welcome!</h1>
        </div>


        <div id="mainDiv">
            <h3 id="how">How to play</h3>
            <p style="text-align: center;"> Here are the rules for our game </p>
            <p style="text-align: center;"> You get five attempts to guess the five letter word </p>
            <p style="text-align: center;"> If you guess the word within the five attempts, you win </p>
            <p style="text-align: center;"> If not, you lose</p>
            <p style="text-align: center;"> The game can be made harder by adding a timer</p>
            <p style="text-align: center;"> If you do not select a timer, you have unlimited time</p>
            <p style="text-align: center;"> Happy guessing!</p>
        </div>
        <div id="cont">
        <button id="play" onclick="gameSetup()"> Play </button>
        </div>  
    </body>
</html>