<?php
include '../includes/DatabaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $userType = $_POST['user_type'];

    // Perform more thorough validation
    $errors = [];

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // Confirm password
    if ($password !== $confirmPassword) {
        $errors[] = "Password and Confirm Password do not match";
    }

    // Check if the username already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$name]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        $errors[] = "Username already exists. Please choose a different username.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Insert user into the database
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, gmail, password, user_type) VALUES (?, ?, ?, ?)");
            // password_hash($password, PASSWORD_BCRYPT)
            $stmt->execute([$name, $email, $password, $userType]);

            // Redirect to a success page or login page
            header("Location: ../admin/login_form.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regiser form</title>

    <!-- custom css link -->
    <link rel="stylesheet" href="../css/form.css">

</head>
<div class="form-container">
    <form action="" method="post">
        <h2>register now</h2>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="confirmpassword" required placeholder="confirm your password">
        <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account? <a href="login_form.php">login now</a></p>
    </form>
</div>

<body>

</body>

</html>