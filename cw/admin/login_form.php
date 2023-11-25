<?php
// Include the database connection file
include('../includes/DatabaseConnection.php');

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to fetch user details
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables for the logged-in user
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        // Redirect to a dashboard or home page
        header("Location: ../index.php");
        exit();
    } else {
        // Display an error message if login fails
        $error_message = "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css link -->
    <link rel="stylesheet" href="../css/form.css">

</head>
<div class="form-container">
    <form action="" method="post">
        <h2>login now</h2>
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>don't have an account? <a href="register_form.php">register now</a></p>
    </form>
</div>

<body>

</body>

</html>