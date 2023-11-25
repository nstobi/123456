<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tobi</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

    <div class="top-bar">
        <ul>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/posts">Posts</a></li>
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
                <option value="news">News</option>
                <option value="tutorials">Tutorials</option>
                <option value="tips-and-tricks">Tips and Tricks</option>
            </select>

            <input type="submit" value="Add Post">
        </form>
    </div>

</body>

</html>