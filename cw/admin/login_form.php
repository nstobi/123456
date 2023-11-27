<?php
include '../includes/DatabaseConnection.php';

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Check if a row is returned
        if ($stmt->rowCount() > 0) {
            // User is authenticated
            // lấy thông tin từ database truyền vào biến $user 
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // tạo 1 session tên là user để lưu trữ biến $user khi nào chuyển sang màn hình khác thì có thể lấy biến đấy ra được
            // phải có session_start(); 
            $_SESSION['user'] = $user;
            // Redirect to dashboard.php
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
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