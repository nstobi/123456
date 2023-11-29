<?php
include '../includes/DatabaseConnection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $postId = $_POST['post_id'];
    $newTitle = $_POST['title'];
    // Add other fields as needed

    // Update the post in the database
    try {
        $stmt = $pdo->prepare("UPDATE posts SET title = :title WHERE post_id = :post_id");
        $stmt->bindParam(':title', $newTitle, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();

        // Close the database connection
        $pdo = null;

        // Redirect to the post viewer page after updating
        header('Location: posts.php');
        exit;
    } catch (PDOException $e) {
        // Handle the exception, e.g., log it or display an error message
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    // If the form was not submitted via POST, redirect to the post viewer page
    header('Location: posts.php');
    exit;
}
?>
