<?php
// Establish a database connection (assuming you already have a connection script)
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform a query to check the credentials
    $query = "SELECT id, role FROM user1 WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_role"] = $row["role"];
            $_SESSION["username"] = $username;

            if ($_SESSION["user_role"] == "admin") {
                header("Location: task.php");
            } else if ($_SESSION["user_role"] == "manager") {
                header("Location: home.php");
            }
        } else {
            // User not found, redirect to registration page
            header("Location: register.html");
        }
    } else {
        echo "Error in query: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
