<?php
include '../includes/DatabaseConnection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $post_id = $_POST["post_id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    try {
        // Update the post in the database using PDO
        $stmt = $pdo->prepare("UPDATE posts SET title=:title, content=:content WHERE post_id=:post_id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':post_id', $post_id);

        $stmt->execute();
        echo "Post updated successfully";
    } catch (PDOException $e) {
        echo "Error updating post: " . $e->getMessage();
    }
}

// Check if the post ID is provided in the URL
if (isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    // ... rest of the code


    try {
        // Fetch post details from the database using PDO
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id=:post_id");
        $stmt->bindParam(':post_id', $post_id);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $title = $row["title"];
            $content = $row["content"];
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Post</title>
            </head>

            <body>
                <h2>Edit Post</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $title; ?>"><br>
                    <label for="content">Content:</label>
                    <textarea name="content"><?php echo $content; ?></textarea><br>
                    <input type="submit" value="Update Post">
                </form>
            </body>

            </html>

<?php
        } else {
            echo "Post not found";
        }
    } catch (PDOException $e) {
        echo "Error fetching post details: " . $e->getMessage();
    }
} else {
    echo "Post ID not provided";
}

// Close the database connection
$pdo = null;
?>