<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../css/posts.css">
</head>

<body>

    <header>
        <h1>Edit Post</h1>
    </header>

    <main>
        <form method="post" action="edit_post.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required><?= htmlspecialchars($post['content']) ?></textarea>

            <button type="submit">Update Post</button>
        </form>
    </main>

</body>

</html>