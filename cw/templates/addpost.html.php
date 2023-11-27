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
            <option value="">tobi</option>
            <option value="#">tobi1</option>
            <option value="#">tobi2</option>
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" ><br>

        <input type="submit" value="Add Post">
    </form>
</body>

</html>