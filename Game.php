<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            <?php session_start(); ?>
            <?php include "Design.css"; ?>
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

                $("#first").focus();

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
                        checkGuess();

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
            var guessCount = 0;
            var row = 0;
            
            //game functionality
            function checkGuess(){
                //increase number of guesses by 1
                guessCount++;
                //get value of guess word by letter
                var collection = document.getElementById("row"+row).children;
                var guessArray = new Array(5);
                guessArray[0] = collection[0].value;
                guessArray[1] = collection[1].value;
                guessArray[2] = collection[2].value;
                guessArray[3] = collection[3].value;
                guessArray[4]  = collection[4].value;

                //get values of correct word by letter
                var word = "<?php echo $word ?>";
                var wordArray = word.split("");

                //compare values and change background colors
                for(let i = 0; i < 5; i++){
                   if(guessArray[i] == wordArray[i]){
                    collection[i].style.backgroundColor = "green";
                   }
                   else if(wordArray.includes(guessArray[i])){
                    collection[i].style.backgroundColor = "yellow";
                   }
                   else{
                    collection[i].style.backgroundColor = "gray";
                   }
                }

                //focus on next row
                row++;
                var nextInput = document.getElementById('row'+row).children;
                nextInput[0].focus();
                
                // win condition
                if(guessArray[0] == wordArray[0] 
                && guessArray[1] == wordArray[1] 
                && guessArray[2] == wordArray[2] 
                && guessArray[3] == wordArray[3] 
                && guessArray[4] == wordArray[4]){
                    alert("Congrats, you won! The word was <?php echo $word?>");
                    window.location.href = 'Account.php';
                }

                return;
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
                <div id="row0" class="inputs">
                    <input id="first" type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                </div>

                <div id="row1" class="inputs">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
                    <input type="text" maxlength="1" minlength="1" class="input">
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

            </div>
        </div>

    </body>
</html> 