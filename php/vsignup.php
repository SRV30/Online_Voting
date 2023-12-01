<?php
// Include the database connection file
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $dob = mysqli_real_escape_string($connection, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);

    // Perform SQL query to insert data into the voter table
    $query = "INSERT INTO voter (name, email, password, dob, gender) VALUES ('$name', '$email', '$password', '$dob', '$gender')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Registration successful
        header("Location: http://localhost/project/vlogin.html");
        exit();
    } else {
        // Registration failed
        echo 'registraion fail';
        header("Location: http://localhost/project/vsignup.html");
        exit();
    }
}
?>
