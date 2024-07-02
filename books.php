<?php
include 'includes/db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// SQL query with search and category filter
$sql = "SELECT book_id, title, author, category, availability FROM books WHERE title LIKE '%$search%'";

if ($category != '' && $category != 'All Category') {
    $sql .= " AND category = '$category'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/books.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'includes/navbar.php'; ?>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <img src="assets/icons/pepicons-pop_menu.svg" alt="menu">
            </div>
        </div>

        <header class="inventory-header">
            <h1>Books Inventory</h1>
            <div class="search-container">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search for book" value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit" class="search-button">
                        <img src="assets/icons/search.svg" alt="search icon">
                    </button>
                </form>
            </div>
            <div class="category-filter">
                <form method="GET" action="">
                    <select name="category" onchange="this.form.submit()">
                        <option>All Category</option>
                        <option value="Fiction" <?php if ($category == 'Fiction') echo 'selected'; ?>>Fiction</option>
                        <option value="Dystopian" <?php if ($category == 'Dystopian') echo 'selected'; ?>>Dystopian</option>
                        <option value="Classic" <?php if ($category == 'Classic') echo 'selected'; ?>>Classic</option>
                        <option value="Adventure" <?php if ($category == 'Adventure') echo 'selected'; ?>>Adventure</option>
                        <option value="Romance" <?php if ($category == 'Romance') echo 'selected'; ?>>Romance</option>
                        <!-- Add other categories here -->
                    </select>
                </form>
            </div>
        </header>
        <div class="main-container">
            <div class="main-content">
                <button class="add-book-button" onclick="location.href='./pages/add_book.php'">+ Add Book</button>
                <div class="books-container">
                    <table class="books-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Availability</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["book_id"] . "</td>";
                                    echo "<td>" . $row["title"] . "</td>";
                                    echo "<td>" . $row["author"] . "</td>";
                                    echo "<td><span class='category-label " . strtolower($row["category"]) . "'>" . $row["category"] . "</span></td>";
                                    echo "<td>" . ($row["availability"] == 'available' ? 'Tersedia' : 'Tidak tersedia') . "</td>";
                                    echo "<td><button style='border: none; cursor: pointer;' onclick=\"location.href='./pages/edit_book.php?id=" . $row["book_id"] . "'\"><img src='assets/images/edit.png' alt='edit icon'></button></td>";
                                    echo "<td><button style='margin-left: -20px; border: none; cursor: pointer;' onclick=\"location.href='controllers/delete_book_process.php?id=" . $row["book_id"] . "'\"><img src='assets/images/delete.png' alt='delete icon'></button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>
    </div>
</body>

</html>

<?php
$conn->close();
?>