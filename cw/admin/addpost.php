<?php
// Include the database connection file
include '../includes/DatabaseConnection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO posts (name, title, content, category, image, date) 
                              VALUES (:name, :title, :content, :category, :image, :date)");

        // Bind parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':content', $_POST['content']);
        $stmt->bindParam(':category', $_POST['category']);

        // Handle image upload
        $imagePath = 'uploads/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

        $stmt->bindParam(':image', $imagePath);

        // Set the current date
        $date = date("Y-m-d");
        $stmt->bindParam(':date', $date);

        // Execute the statement
        $stmt->execute();

        // Redirect to a success page or wherever you want
        header('Location: success.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>