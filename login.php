<?php
ob_start();
?>
<html> 
    <head>
        <title> Login Page </title>

        <script> 

        </script>
        
        <style> 
            <?php include "Design.css" ?>
            <?php include "mainproj.css" ?>

        </style>

    </head>

    <body>
        <div id="bar"> 
            Wrodle
            </div><br><br>

            <div id="LoginDiv">
                <h1 style="padding: 5%;"> Login </h1>
                <form name="login" method="post" enctype="multipart/form-data"> 
                

                <table id="table2"> 
                    <tr> 
                        <td> Username:</td>
                        <td> <input name="Uname" id="Uname" type="text"></td>
                    </tr>
                    <tr> 
                        <td> Password:</td>
                        <td> <input name="password1" id="password1" type="password"></td>
                    </tr>
                </table>

                <br> 

                <button type="submit" class="otherButtons">Login </button> <br> <br>
                <button type="button"> <a href="signup.php"> Go to Sign Up </a> </button>
                </form>
            </div>
    </body>
    <?php 

        function is_data_valid() {
            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                return false;
            }

            if (empty($_REQUEST["Uname"]) || empty($_REQUEST["password1"])) {
                return false;
            }

            return true;
        }

        $conn = new mysqli("localhost", "wrodleAdmin", "ZipBombLover696969", "wrodle");
        if ($conn->connect_error) {
            echo "Connection error";
        } 

        else if(is_data_valid()) {

            $uname = $_REQUEST["Uname"];

            $stmt = $conn->prepare("SELECT passwordHash FROM account WHERE username = ?");
            $stmt->bind_param("s", $uname);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                $hash = $row['passwordHash'];

                if (password_verify($_REQUEST["password1"], $hash)) {
                    
                    session_start();
                    $_SESSION["Uname"] = $uname;
                    $_SESSION["hash"] = $hash;
                    header("Location: /Wrodle/wr-main.html");
                } else {
                    echo "Authentication failed";
                }
            } else {
                echo "Login failed2";
            }

            $stmt->close();
        }           

        ob_end_flush();
    ?>
</html>