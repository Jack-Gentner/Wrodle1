<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "wrodle");

    $stmt = $conn->prepare("UPDATE stats SET gamesPlayed = gamesPlayed + 1, winStreak = 0 WHERE uid = ? ");
    $stmt->bind_param("s", $_SESSION['uid']);
    $stmt->execute();
    $stmt->close();

    header("Location: ./Account.php");
?>