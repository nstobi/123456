<?php
session_start();

// Check if the user is logged in and has the "user" role
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
    // Redirect to the login page or display an error message
    header("Location: ../admin/login_form.php");
    exit();
}

// The user is logged in, and this is the user page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <div class="dashboard-container">
        <h1>Welcome to the User Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
        <!-- Add your user-specific content here -->
        <p>This is your personalized user dashboard.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>
