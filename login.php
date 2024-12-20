<?php



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];


    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "auth";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        header("Location: index.html");
        exit();
    }
    else{
        header("Location: login.html");
        exit();
    }
    $conn->close();

}
