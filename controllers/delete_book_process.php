<?php
include('../includes/db.php');

$book_id = $_GET["id"];
$sql = "DELETE FROM books WHERE book_id=$book_id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../books.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
