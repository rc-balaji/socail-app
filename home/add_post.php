<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (content) VALUES (?)");
    $stmt->execute([$content]);

    header("Location: index.php"); 
    exit();
}
?>
