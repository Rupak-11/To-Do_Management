<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $role = htmlspecialchars($_POST["role"]);

    // Validate $role against allowed values
    $allowedRoles = ['admin', 'manager'];

    if (!in_array($role, $allowedRoles)) {
        // Handle invalid role error (redirect or show an error message)
        echo "Invalid role!";
        exit;
    }

    
    $query = "INSERT INTO user1 (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($con->query($query) === TRUE) {
        header("Location:index.html");
        exit; // You should exit after a successful header redirection to prevent further execution
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

    $con->close();
}
?>
