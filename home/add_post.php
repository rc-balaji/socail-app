<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    // Validate and sanitize $content as needed

    $stmt = $conn->prepare("INSERT INTO posts (content) VALUES (?)");
    $stmt->execute([$content]);

    header("Location: index.php"); // Redirect back to the main page
    exit();
}
?>
