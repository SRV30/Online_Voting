<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $oid = $_POST["oid"];
    
    $stmt = $connection->prepare("INSERT INTO organisations (name, email, password, oid) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $oid);
    
    if ($stmt->execute()) {
        header("Location: organsignup.php");
    } else {
        // Registration failed
        echo "Registration failed: " . $stmt->error;
    }
    
    $stmt->close();
}

// Close the database connection
$connection->close();
?>


