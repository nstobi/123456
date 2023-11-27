<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if not logged in
    header("Location: ../admin/login_form.php");
    exit();
}

// Access user information
// user (user_id, username, password, gmail, user_type)
$user = $_SESSION['user'];

// Access the username from the user array
// lấy cột username trong bảng user để gán vào $username
$username = $user['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tobi</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <div class="top-bar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/admin/settings">Settings</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Add New Post</h1>

        <form action="add-post" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Post Title">
            <input type="file" name="image" placeholder="Post Image">
            <textarea name="content" placeholder="Post Content"></textarea>

            <select name="category">
                <option value="">Select Category</option>
                <option value="#">tobi</option>
                <option value="#">tobi1</option>
                <option value="#">tobi2</option>
            </select>

            <input type="submit" value="Add Post">
        </form>
    </div>

</body>

</html>