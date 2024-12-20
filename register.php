<?php

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if (empty($username) || empty($password)) {
        header("Location: rejestracja.html");
        exit();
    } else {
        $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

        if (!empty($conn)) {
            if ($conn->query($sql) === TRUE) {
                header("Location: login.html");
                exit();
            } else {
                echo "Błąd: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();
}
