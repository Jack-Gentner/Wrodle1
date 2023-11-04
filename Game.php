<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="Design.css">
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

    </head>
    <body>

        <div class="navbar">
            <a href="wr-main.html"><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="Account.html"><i class="fas fa-cog"></i></a>
            <!-- Welcome Header -->
            <h1 class="header">Welcome!</h1>
        </div>
        
        <div id="screen">
            <h1 id="gHeader"> Game </h1>
            <h2 id="timer"> 0:00 </h2>

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