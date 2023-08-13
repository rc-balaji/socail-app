<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

   
    $user_id = 1;

    
    $stmt = $conn->prepare("SELECT * FROM shared_posts WHERE user_id = ? AND post_id = ?");
    $stmt->execute([$user_id, $post_id]);
    $existingShare = $stmt->fetch();

    if (!$existingShare) {
       $stmt = $conn->prepare("INSERT INTO shared_posts (user_id, post_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $post_id]);
    }

    header("Location: index.php");
    exit();
}
?>
