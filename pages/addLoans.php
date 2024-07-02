<?php 
include '../controllers/addLoans.php';
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Loans</title>
    <link rel="stylesheet" href="../css/loans.css">
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../assets/icons/Ellipse 16.svg" alt="logo">
                        </span>
                        <span class="title">Library - N</span>
                    </a>
                </li>

                <li>
                    <a href="../index.php">
                        <span class="icon">
                            <img src="../assets/icons/ic_round-home.svg" alt="home_icon">
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../books.php">
                        <span class="icon">
                            <img src="../assets/icons/fa_book.svg" alt="book_icon">
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>

                <li>
                    <a href="../members.php">
                        <span class="icon">
                            <img src="../assets/icons/f7_person-2-fill.svg" alt="member_icon">
                        </span>
                        <span class="title">Members</span>
                    </a>
                </li>

                <li>
                    <a href="../loans.php">
                        <span class="icon">
                            <img src="../assets/icons/lets-icons_date-range-fill.svg" alt="loan_icon">
                        </span>
                        <span class="title">Loans</span>
                    </a>
                </li>

                <li>
                    <a href="../report.php">
                        <span class="icon">
                            <img src="../assets/icons/material-symbols_library-books.svg" alt="report_icon">
                        </span>
                        <span class="title">Report</span>
                    </a>
                </li>

                <li>
                    <a href="../auth/logout.php">
                        <span class="icon">
                            <img src="../assets/icons/majesticons_logout.svg" alt="logout_icon">
                        </span>
                        <span class="title">Log out</span>
                    </a>
                </li>
                <li class="settings">
                    <a href="../settings.php">
                        <span class="icon">
                            <img src="../assets/icons/uiw_setting.svg" alt="setting_icon">
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ========================= Main ==================== -->
    <div class="main">
    <div class="topbar">
            <div class="toggle">
                <img src="../assets/icons/pepicons-pop_menu.svg" alt="menu">
            </div>
        </div>
        <div class="add-form">
            <h2>Add Loans</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>
                <label for="title">Book Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>
                <label for="loans">Loans Date:</label><br>
                <input type="date" id="loans" name="loans" required><br><br>
                <label for="returns">Return Date:</label><br>
                <input type="date" id="returns" name="returns" required><br><br>
                <label for="status">Status:</label><br>
                <input type="text" id="status" name="status" required><br><br>
                <button type="submit">Add Loans</button>
                <a href="../loans.php">Back</a>
            </form>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="../js/main.js"></script>
</body>
</html>
