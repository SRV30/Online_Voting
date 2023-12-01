<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM admins WHERE email = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: http://localhost/project/front.html");
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $connection->close();
}
