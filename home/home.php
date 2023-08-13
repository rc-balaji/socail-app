<!DOCTYPE html>
<html>
<head>
    <title>Twitter-like App</title>
</head>
<body>
    <h1>Welcome to Your Social App</h1>

    <!-- Add Post Form -->
    <form action="add_post.php" method="post">
        <textarea name="content" placeholder="Write your post"></textarea>
        <button type="submit">Add Post</button>
    </form>

    <!-- Display Posts -->
    <h2>Recent Posts</h2>
    <?php
    require 'config.php';

    // Fetch posts and their like counts
    $stmt = $conn->prepare("SELECT p.*, COUNT(l.id) AS like_count FROM posts p LEFT JOIN likes l ON p.id = l.post_id GROUP BY p.id ORDER BY p.created_at DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post) {
        echo "<div>";
        echo "<p>{$post['content']}</p>";
        echo "<p>Likes: {$post['like_count']}</p>";
        echo "<a href='like.php?post_id={$post['id']}'>Like</a>";
        echo "<a href='dislike.php?post_id={$post['id']}'>Dislike</a>";
        echo "<a href='share.php?post_id={$post['id']}'>Share</a>";
        echo "</div>";
    }
    ?>
</body>
</html>
