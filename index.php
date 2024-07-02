<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libary-N</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById("success-message");
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <?php
    include 'includes/navbar.php';
    ?>
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <img src="assets/icons/pepicons-pop_menu.svg" alt="menu">
            </div>
        </div>
        <div class="main-container">
            <div class="main-content">
                <header class="header-container">
                    <div class="header-left">
                        <h1 style="color: #74512D;">Welcome, Library Admin</h1>
                        <p style="margin-top: 10px; color: rgba(116, 87, 70, 0.5);;">Manage your library with ease</p>
                    </div>
                    <div class="header-right">
                        <span class="notification-icon">
                            <img src="assets/images/ion_notifcations.png" alt="notification_icon">
                        </span>
                    </div>
                </header>
                <div class="container">
                    <div class="cards-and-chart">
                        <div class="cards-calendar">
                            <div class="card-container">
                                <div class="card" id="books">
                                    <div class="card-content">
                                        <div class="card-header">
                                            <span style="color: #74512D;">Books</span>
                                            <img src="assets/images/books-icon.png" alt="Book Icon" class="card-icon">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-number">Loading...</p>
                                            <p class="card-change">
                                                <span class="change-percentage">Loading...</span>
                                                <span class="card-date">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="totalMembersCard">
                                    <div class="card-content">
                                        <div class="card-header">
                                            <span style="color: #74512D;">Members</span>
                                            <img src="assets/images/members-icon.png" alt="Members Icon" class="card-icon">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-number">Loading...</p>
                                            <p class="card-change">
                                                <span class="change-percentage">Loading...</span>
                                                <span class="card-date">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="activeLoansCard">
                                    <div class=" card-content">
                                        <div class="card-header">
                                            <span style="color: #74512D;">Active Loans</span>
                                            <img src="assets/images/date-icon.png" alt="Date Icon" class="card-icon">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-number">Loading...</p>
                                            <p class="card-change">
                                                <span class="change-percentage">Loading...</span>
                                                <span class="card-date">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="lateReturnsCard">
                                    <div class=" card-content">
                                        <div class="card-header">
                                            <span style="color: #74512D;">Late Returns</span>
                                            <img src="assets/images/books-icon.png" alt="Book Icon" class="card-icon">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-number">Loading...</p>
                                            <p class="card-change">
                                                <span class="change-percentage">Loading...</span>
                                                <span class="card-date">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-calendar">
                                <div class="calendar-container">
                                    <h2>Library Events Calendar</h2>
                                    <iframe src="https://calendar.google.com/calendar/embed?src=your-calendar-id" style="border: 0" width="100%" height="300" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="container-chart">
                            <div class="chart-container">
                                <h2>Library Statistics Overview (January)</h2>
                                <canvas id="januaryOverviewChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>
    </div>

</body>

</html>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./auth/login.php");
    exit();
}

$success_message = '';
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}
?>
<?php if ($success_message) : ?>
    <div id="success-message" class="success">
        <?php echo $success_message; ?>
    </div>
<?php endif; ?>