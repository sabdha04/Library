<?php
include('../includes/db.php');

$id = $_GET['id'];
$sql = "DELETE FROM members WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Member deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../members.php");
?>