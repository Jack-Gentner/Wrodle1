<!DOCTYPE html>
<html lang="en">
    <?php session_start();
    
    function is_data_valid() {
        if (empty($_POST["difficulty"])){
            $_SESSION['difficulty'] = null;
        } else{
            $_SESSION['difficulty'] = $_POST['difficulty'];
        }

    }

    if(array_key_exists('play', $_POST)){
        is_data_valid();

        header("Location: ./Game.php");
    }
    ?>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <meta charset="UTF-8">
        <title> Game </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#timed').click(function(){
                    $('#timerForm').css("display", "inline-block");
                    $('#firstPlay').css("display", "none");

                });
                $('#notTimed').click(function(){
                    $('#timerForm').css("display", "none");
                    $('#firstPlay').css("display", "inline-block");
                });
            });
        </script>

    </head>
        <style>
            <?php include "Design.css" ?>
        </style>

    <body>
        <div class="navbar">
            <a href="./wr-main.php" ><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="./Account.php"><i class="fas fa-cog"></i></a>
            <!-- Welcome Header -->
            <h1 class="header">Welcome!</h1>
        </div>


        <div id="setupContainer">
            <h3 id="how">Setup</h3>
                <form method="post">

                    <label for="timer">Timed</label>
                    <input id="timed" type="radio" name="timer">

                    <label for="notTimed">Not Timed</label>
                    <input id="notTimed" type="radio" name="timer">

                    <br>

                    <input id="firstPlay" name="play" type="submit" value="Start">

                </form>

                <br>

                <form method="post" style="display: none;" id="timerForm">

                    <label for="option3">3 Minutes</label>
                    <input id="option3" type="radio" name="difficulty" value="easy">

                    <label for="option2">1.5 Minutes</label>
                    <input id="option2" type="radio" name="difficulty" value="medium">

                    <label for="option1">45 Seconds</label>
                    <input id="option1" type="radio" name="difficulty" value="hard">

                    <br>

                    <input name="play" type="submit" value="Start" />

                </form>
        </div>
    </body>
</html>