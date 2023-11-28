<?php

include '../includes/DatabaseConnection.php';

session_start();

function getPosts($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle the exception, e.g., log it or display an error message
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array in case of an error
    }
}
?>

<?php
// Close the database connection
$pdo = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>  
    <h2>Add a New Post</h2>
    <form action="../admin/addpost.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <select name="category">
            <option value="">Select Category</option>
            <option value="nature">nature</option>
            <option value="education">education</option>
            <option value="business">business</option>
            <option value="news">news</option>
            <option value="gaming">gaming</option>
            <option value="sports">sports</option>
            <option value="design">design</option>
            <option value="fashion">fashion</option>
            <option value="travel">travel</option>
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" ><br>

        <input type="submit" value="Add Post">
    </form>
</body>

</html>