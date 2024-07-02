<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="../css/add_book.css">
</head>

<body>
    <div class="main-container">
        <h1>Add Book</h1>
        <form method="POST" action="../controllers/add_book_process.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
            <br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            <br>
            <label for="availability">Availability:</label>
            <select id="availability" name="availability">
                <option value="available">Tersedia</option>
                <option value="unavailable">Tidak tersedia</option>
            </select>
            <br>
            <button type="submit">Add Book</button>
        </form>
        <button class="cancel-button" onclick="location.href='./books.php'">Cancel</button>
    </div>
</body>

</html>
