<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Get user ID from session (replace this with your actual user authentication logic)
    $user_id = 1; // Replace with the user's actual ID

    // Check if the user has already disliked the post
    $stmt = $conn->prepare("SELECT * FROM dislikes WHERE user_id = ? AND post_id = ?");
    $stmt->execute([$user_id, $post_id]);
    $existingDislike = $stmt->fetch();

    if (!$existingDislike) {
        // Insert the dislike into the dislikes table
        $stmt = $conn->prepare("INSERT INTO dislikes (user_id, post_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $post_id]);
    }

    header("Location: index.php"); // Redirect back to the main page
    exit();
}
?>
