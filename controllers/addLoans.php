<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $loans = $_POST['loans'];
    $returns = $_POST['returns'];
    $status = $_POST['status'];

    $sql = "INSERT INTO loans (name, title, loans, returns, status) VALUES ('$name', '$title', '$loans', '$returns', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../loans.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>