<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "wrodle");
    
    if($_SESSION['difficulty']){
        $stmt = $conn->prepare("SELECT hardestDifficulty FROM stats WHERE uid = ?");
        $stmt->bind_param("s", $_SESSION["uid"]);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        if(!$row['hardestDifficulty']){
            $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1, hardestDifficulty = ? WHERE uid = ? ");
            $stmt2->bind_param("ss", $_SESSION["difficulty"], $_SESSION["uid"]);
            $stmt2->execute();
            $stmt2->close();
        }else if($row['hardestDifficulty'] == "easy" && $_SESSION["difficulty"] == "medium"){
            $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1, hardestDifficulty = ? WHERE uid = ? ");
            $stmt2->bind_param("ss", $_SESSION["difficulty"], $_SESSION["uid"]);
            $stmt2->execute();
            $stmt2->close();
        }else if($row['hardestDifficulty'] == "medium" && $_SESSION["difficulty"] == "hard"){
            $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1, hardestDifficulty = ? WHERE uid = ? ");
            $stmt2->bind_param("ss", $_SESSION["difficulty"], $_SESSION["uid"]);
            $stmt2->execute();
            $stmt2->close();
        }else if($row['hardestDifficulty'] == "easy" && $_SESSION["difficulty"] == "hard"){
            $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1, hardestDifficulty = ? WHERE uid = ? ");
            $stmt2->bind_param("ss", $_SESSION["difficulty"], $_SESSION["uid"]);
            $stmt2->execute();
            $stmt2->close();
        }else if($row['hardestDifficulty']){
            $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1 WHERE uid = ? ");
            $stmt2->bind_param("s", $_SESSION["uid"]);
            $stmt2->execute();
            $stmt2->close();
        }
    }else{
        $stmt2 = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, gamesWon = gamesWon + 1, winStreak = winStreak + 1 WHERE uid = ? ");
        $stmt2->bind_param("s", $_SESSION["uid"]);
        $stmt2->execute();
        $stmt2->close();
    }

    header("Location: ./Account.php");
?>