<!DOCTYPE html>
<?php
    session_start();

    $conn = new mysqli("localhost", "wrodleAdmin", "ZipBombLover696969", "wrodle");
    if ($conn->connect_error) {
        echo "Connection error";
    }
    else{
        #find user data
        $stmt = $conn->prepare("SELECT * FROM stats WHERE uid = ?");
        $stmt->bind_param("s", $_SESSION['uid']);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $gamesPlayed = $row["gamesPlayed"];
        $gamesWon = $row["gamesWon"];
        $fewestGuesses = $row["fewestGuesses"];
        $winStreak = $row["winStreak"];
        $quickestTime = $row["quickestTime"];
        $hardestDifficulty = $row["hardestDifficulty"];
    }

    if(array_key_exists('logout', $_POST)){
        logout();
    }

    function logout(){ 
        session_destroy();

        header('Location: /Wrodle/Wrodle/login.php');   
    }
?>

<html lang="en">
    <head>
        <style>
            <?php include "Design.css" ?>
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <meta charset="UTF-8">
        <title> Account </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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

        <form method="post">
            <input id="logoutB" type="submit" name="logout" value="logout">
        </form>

        <div id="screen">
            <h1 id="aHeader"> Account </h1>

            <br>

            <div id="accDetails">
                <br>
                <br>
                <h2 style="text-decoration: underline;">
                    Stats
                </h2>

                <h3> Games Played:</h3>
                <p id="gamesPlayed"> <?php echo $gamesPlayed ?> </p>
                <br>
                <br>

                <h3> Games Won:</h3>
                <p id="gamesWon"> <?php echo $gamesWon ?> </p>
                <br>
                <br>

                <h3> Shortest Guess:</h3>
                <p id="shortestGuess"> <?php echo $fewestGuesses ?> </p>
                <br>
                <br>

                <h3> Win Streak:</h3>
                <p id="winStreak"> <?php echo $winStreak ?> </p>
                <br>
                <br>

                <h3> Hardest Difficulty Won:</h3>
                <p id="hardestDifficulty"> <?php echo $hardestDifficulty ?> </p>
                <br>
                <br>
                <br>

                <h3> Date of Account Creation:</h3>
                <p id="dateCreated"> <?php echo $_SESSION["doc"] ?> </p>

            </div>

        </div>

    </body>
</html>