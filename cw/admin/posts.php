<?php
// Include your database connection
include('../includes/DatabaseConnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('header_posts.php'); ?>

    <div class="content">
        <h1>Posts</h1>

        <?php
        // Fetch posts from the database
        $stmt = $pdo->query("SELECT * FROM posts");
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display posts
        foreach ($posts as $post) {
            echo '<div class="post">';
            echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
            echo '<p>' . htmlspecialchars($post['content']) . '</p>';
            echo '<p><strong>Category:</strong> ' . htmlspecialchars($post['category']) . '</p>';
            echo '<p><strong>Date:</strong> ' . $post['date'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>