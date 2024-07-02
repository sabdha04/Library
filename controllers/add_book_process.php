<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $availability = $_POST["availability"];

    $sql = "INSERT INTO books (title, author, category, availability) VALUES ('$title', '$author', '$category', '$availability')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../books.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
