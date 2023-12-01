<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    
    $stmt = $connection->prepare("INSERT INTO admins (name, email, password, birthdate, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $birthdate, $gender);
    
    if ($stmt->execute()) {
        header("Location: http://localhost/project/alogin.html");
    } else {
        // Registration failed
        echo "Registration failed: " . $stmt->error;
    }
    
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
