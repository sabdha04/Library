<?php
include '../includes/db.php';

$book_id = $_GET["id"];
$sql = "SELECT * FROM books WHERE book_id=$book_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No book found with ID $book_id";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="../css/edit_book.css">
</head>

<body>
    <div class="edit-form">
        <h2>Edit Book</h2>
        <form method="POST" action="../controllers/edit_book_process.php">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required>
            <br>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $row['author']; ?>" required>
            <br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>" required>
            <br>
            <label for="availability">Availability:</label>
            <select id="availability" name="availability">
                <option value="available" <?php if ($row['availability'] == 'available') echo 'selected'; ?>>Tersedia</option>
                <option value="unavailable" <?php if ($row['availability'] == 'unavailable') echo 'selected'; ?>>Tidak tersedia</option>
            </select>
            <br>
            <button type="submit">Update Book</button>
        </form>
        <button class="cancel-button" onclick="location.href='./books.php'">Cancel</button>
    </div>
</body>

</html>