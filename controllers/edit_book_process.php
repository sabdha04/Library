<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST["book_id"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $availability = $_POST["availability"];

    $sql = "UPDATE books SET title='$title', author='$author', category='$category', availability='$availability' WHERE book_id=$book_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../books.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
