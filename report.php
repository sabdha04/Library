<?php include('./includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/report.css">
</head>
<body>
<!-- =============== Navigation ================ -->
<?php include './includes/navbar.php'; ?>
<!-- ========================= Main ==================== -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <img src="assets/icons/pepicons-pop_menu.svg" alt="menu">
        </div>
        <h2>Library Report</h2>

    <script src="js/main.js"></script>
</div>

    <div class="container-wrapper">
        <div class="most-borrowed">
            <h2>Book Most Borrowed</h2>
            <div class="card">
                <div class="card-content">
                    <table class="most-borrowed-books">
                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Book Title</th>
                                <th>Borrow Count</th>
                            </tr>

                            <?php
                            $sql = "SELECT * FROM most_borrowed_books ORDER BY book_id Asc";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>".$row["id"]."</td>
                                        <td>".$row["book_id"]."</td>
                                        <td>".$row["borrow_count"]."</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Books found</td></tr>";
                            }
                            ?>

                        </table>



                </div>
            </div>
        </div>
        <div class="most-active">
            <h2>Most Active Member</h2>
            <div class="card">
                <div class="card-content">
                    <table class="most-active-member">
                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Borrow Count</th>
                            </tr>

                            <?php
                            $sql = "SELECT m.name, am.id, am.member_id, am.borrow_count
                            FROM most_active_members am
                            INNER JOIN members m ON am.member_id = m.id
                                ORDER BY am.id ASC;";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>".$row["id"]."</td>
                                        <td>".$row["name"]."</td>
                                        <td>".$row["borrow_count"]."</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Members found</td></tr>";
                            }
                            ?>

                        </table>



                </div>
            </div>

        </div>
        <div class="books-bycategory">
            <h2>Total Books By Category</h2>
            <div class="card">
                <div class="card-content">
                    <table class="total-books-bycategory">
                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Total Books</th>
                            </tr>

                            <?php
                            $sql = "SELECT * FROM total_books_by_category ORDER BY id Asc";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>".$row["id"]."</td>
                                        <td>".$row["category"]."</td>
                                        <td>".$row["total_count"]."</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Category found</td></tr>";
                            }
                            ?>

                        </table>
                </div>
            </div>
        </div>
        <div class="lost-damaged-book">
            <h2>Lost And Damaged Book</h2>
            <div class="card">
                <div class="card-content">
                    <table class="lost-and-damaged-books">
                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Book Title</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>

                            <?php
                            $sql = "SELECT * FROM lost_damaged_books ORDER BY id Asc";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>".$row["id"]."</td>
                                        <td>".$row["book_id"]."</td>
                                        <td>".$row["status"]."</td>
                                        <td>".$row["details"]."</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Books found</td></tr>";
                            }
                            ?>

                        </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
