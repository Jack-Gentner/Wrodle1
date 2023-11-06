<!DOCTYPE html>
<html> 
    <head>
        <title> Sign up </title>

        <style>
            <?php include "Design.css" ?>
        </style>

        <script> 
            window.addEventListener("load", function(){
                let signupForm = document.forms.signup
                signupForm.addEventListener("submit", function(event){

                if (singupForm.pass1.value.length < 8) {
                    event.preventDefault();
                    window.alert("Invalid password")
                }
                if (signupForm.pass1.value !== signupForm.pass2.value){
                    event.preventDefault();
                    window.alert("Passwords do not match")
                }

                });
            });
            
        </script>


        </head>

    <body>
    
            <div id="LoginDiv" class="centerText">
            <h1 style="padding: 5%;"> Sign Up </h1> <br> 
                <form name="signup" method="post" enctype="multipart/form-data"> 
                Username: <input id="uname" name="uname" type="text"><p></p>
                Password: <input id="pass1" name="pass1" type="password"> <p></p> 
                Re-enter Password: <input id="pass2" name="pass2" type="password"> <p></p>
                <button type="submit"> Sign up </a></button>
                <button type="button"> <a href="login.php"> Go to Login </a> </button>
                </form>
        
        </div>
        <?php

            function is_data_valid() {
                // add check if username exists or not
                if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    return false;
                }

                if (empty($_REQUEST["uname"]) || empty($_REQUEST["pass1"]) || empty($_REQUEST["pass2"])) {
                    return false;
                }

                if (strlen($_REQUEST["pass1"]) < 8) {
                    return false;   
                }

                if ($_REQUEST["pass1"] !== $_REQUEST["pass2"]) {
                    return false;   
                }

                return true;
            }

            $conn = new mysqli("localhost", "wrodleAdmin", "ZipBombLover696969", "wrodle");

        if ($conn->connect_error) {
            echo "Connection error";
            
        }
        else if(is_data_valid()) {
            $uname = $_REQUEST["uname"];
            $hash = password_hash($_REQUEST["pass1"], PASSWORD_DEFAULT);
            $currentDate = date('Y-m-d'); 
        
            $stmt = $conn->prepare("INSERT INTO account (username, passwordHash, creationDate) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $uname, $hash, $currentDate);
            $stmt->execute();
            $stmt->close();

            $stmt2 = $conn->prepare("SELECT uid FROM account WHERE username = ?");
            $stmt2->bind_param("s", $uname);
            $stmt2->execute();

            $result2 = $stmt2->get_result();
            $row2 = $result2->fetch_assoc();
            $uid = $row2['uid'];            

            session_start();
            $_SESSION["uid"] = $uid;
            $_SESSION["uname"] = $uname;
            $_SESSION["hash"] = $hash;
            $_SESSION["doc"] = $currentDate;

            header('Location: /Wrodle/Wrodle/wr-main.html');
        }
        else if ($_SERVER["REQUEST_METHOD"] === "POST") {
            ?>
            <p> Couldn't create an account. Please try again. </p>
        
        <?php
        }
        ?>

    </body>
</html>