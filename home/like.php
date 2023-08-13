<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $stmt = $conn->prepare("INSERT INTO likes (post_id) VALUES (?)");
    $stmt->execute([$post_id]);

    header("Location: index.php"); 
    exit();
}
?>
