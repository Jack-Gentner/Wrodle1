<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            <?php session_start(); ?>
            <?php include "Design.css" ?>
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <meta charset="UTF-8">
        <title> Game </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        
        
        <?php

            $conn = new mysqli("localhost", "wrodleAdmin", "ZipBombLover696969", "wrodle");

            if($conn->connect_error){
                echo "Cannot connect to database";
            }
            else{

                #Get max and min word IDs, so we can generate a random number between the two
                $stmt = $conn->prepare("SELECT MAX(wid) AS maxID, MIN(wid) AS minID FROM wordlist");
                $stmt->execute();

                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $maxNum = $row['maxID'];
                $minNum = $row['minID'];

                #get random number between these two values (inclusive)
                $wordNum = rand($minNum, $maxNum);

                #retrieve word from the database
                $stmt2 = $conn->prepare("SELECT word FROM wordlist WHERE wid = ?");
                $stmt2->bind_param("s", $wordNum);
                $stmt2->execute();

                $result2 = $stmt2->get_result();
                $row2 = $result2->fetch_assoc();
                global $word;
                $word = $row2['word'];
            }
        ?>
        <script>
            $(document).ready(function (){

                $("#inp1").focus();

                $("input").keydown(function(event){
                    var keycode = event.keyCode;

                    if(keycode == 8){
                        if($(this).val() != ''){
                            return;
                        }
                        else{
                            $(this).prev().focus();
                            $(this).val('');
                        }   
                    }
                });

                $("input").keyup(function(event){
                    var keycode = event.keyCode;

                    //create check to see if key codes are letters
                    if(keycode == 13){
                        //Check Guess
                        alert($(this).val());
                    }
                    else if (keycode == 8){
                        return;
                    }
                    else{
                        $(this).next().focus();
                    }
                });
            });
        </script>
        <script>
                        
            //counter variable
            var count = 0;
            //game functionality
            def checkGuess(){
                //increase number of guesses by 1
                count++;
                //get value of guess word by letter
                var guessArray;
                guessArray[0] = document.getElementById('inp1');
                guessArray[1] = document.getElementById('inp2');
                guessArray[2] = document.getElementById('inp3');
                guessArray[3] = document.getElementById('inp4');
                guessArray[4]  = document.getElementById('inp5');

                //get values of correct word by letter
                var word = "<?php echo $word ?>";
                var wordArray = word.split("");

                //compare values
                for(let i = 0; i < 5; i++){
                    
                }
            }

        </script>

    </head>
    <body>

        <div class="navbar">
            <a href="wr-main.php"><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="Account.php"><i class="fas fa-cog"></i></a>
            <!-- Welcome Header -->
            <h1 class="header">Welcome!</h1>
        </div>
        
        <div id="screen">
            <h1 id="gHeader"> Game </h1>
            <h2 id="timer1" style="text-align:center;"> </h2>
                <?php
                    #start timer
                        if($_SESSION['difficulty'] == "easy" ){
                            $goodWord = $GLOBALS['word'];
                            echo 
                                "<script>
                                    let count = 180;
                                    const timer = setInterval(function() {
                                        document.getElementById('timer1').innerHTML = count + ' Seconds Left';
                                        if (count === 0) {
                                            document.getElementById('timer1').innerHTML = 0;
                                            clearInterval(timer);
                                            alert('Times up! The word was $goodWord.');
                                            window.location.href = 'Account.php';
                                        }
                                        count--;
                                    }, 1000);
                                </script>";
                        }
                        else if($_SESSION['difficulty'] == "medium" ){
                            $goodWord = $GLOBALS['word'];
                            echo 
                                "<script>
                                    let count = 90;
                                    const timer = setInterval(function() {
                                        document.getElementById('timer1').innerHTML = count + ' Seconds Left';
                                        if (count === 0) {
                                            document.getElementById('timer1').innerHTML = 0;
                                            clearInterval(timer);
                                            alert('Times up! The word was $goodWord.');
                                            window.location.href = 'Account.php';
                                        }
                                        count--;
                                    }, 1000);
                                </script>";
                        }
                        else if($_SESSION['difficulty'] == "hard" ){
                            $goodWord = $GLOBALS['word'];
                            echo 
                                "<script>
                                    let count = 45;
                                    const timer = setInterval(function() {
                                        document.getElementById('timer1').innerHTML = count + ' Seconds Left';
                                        if (count === 0) {
                                            document.getElementById('timer1').innerHTML = 0;
                                            clearInterval(timer);
                                            alert('Times up! The word was $goodWord.');
                                            window.location.href = 'Account.php';
                                        }
                                        count--;
                                    }, 1000);
                                </script>";
                        }else{
                            echo "<script> document.getElementById('timer1').innerHTML = 'No timer, take your time.'</script> ";
                        }
                ?>
            <br>
            <br>
            
            <div id="guesses">
                <div id="row1" class="inputs">
                    <input id="inp1" type="text" maxlength="1" minlength="1" class="input">
                    <input id="inp2" type="text" maxlength="1" minlength="1" class="input">
                    <input id="inp3" type="text" maxlength="1" minlength="1" class="input">
                    <input id="inp4" type="text" maxlength="1" minlength="1" class="input">
                    <input id="inp5" type="text" maxlength="1" minlength="1" class="input">
                </div>

                <div id="row2" class="inputs">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                </div>

                <div id="row3" class="inputs">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                </div>

                <div id="row4" class="inputs">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                </div>

                <div id="row5" class="inputs">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                </div>

            </div>
        </div>

    </body>
</html> 