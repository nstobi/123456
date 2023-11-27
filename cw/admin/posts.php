<?php

include '../includes/DatabaseConnection.php';

session_start();

function getPosts($pdo) {
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


<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .post h2 {
            color: #333;
        }

        .post p {
            color: #666;
        }
    </style>
</head>
</head>
<body>

    <header>
        <h1>Post Viewer</h1>
    </header>

    <main>
        <?php
        $posts = getPosts($pdo);
        foreach ($posts as $post) {
            ?>
            <div class="post">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p><?= htmlspecialchars($post['content']) ?></p>
                <!-- Add more details as needed, e.g., category, image, date -->
            </div>
            <?php
        }
        ?>
    </main>

    <!-- Add Post button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="../templates/addpost.html.php" style="text-decoration: none; padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 5px;">Add Post</a>
    </div>

</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
