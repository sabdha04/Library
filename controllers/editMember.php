<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM members WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $member = $result->fetch_assoc();
    } else {
        echo "Member not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: ../members.php');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
