<?php include('./includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/loans.css">
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
            <h2>Loans</h2>
            <div class="tambahbtn">
                <a href="./pages/addLoans.php"><i class="fa fa-plus"></i><b> Add Loans</b></a>
            </div>
        </div>
        <div class="btnActiveLoans">
            <a href="#"><b> Active Loans</b></a>
        </div>
        <br>
        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <div class="table-container">
                        <table class="loans-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Book Title</th>
                                    <th>Loans Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Corrected SQL query
                            $sql = "SELECT * FROM loans";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>".$row["id"]."</td>
                                            <td>".$row["name"]."</td>
                                            <td>".$row["title"]."</td>
                                            <td>".$row["loans"]."</td>
                                            <td>".$row["returns"]."</td>
                                            <td>".$row["status"]."</td>
                                            <td>
                                                <a href='./editLoans.php?id=".$row["id"]."'><i class='fa fa-pencil-square'></i></a> |
                                                <a href='./controllers/deleteLoans.php?id=".$row["id"]."'><i class='fa fa-book'></i></a>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No loans found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="viewbtn">
                <a href="#"></i><b>View All</b></a>
        </div>
        <br><br><br>
        <div class="btnActiveLoans">
            <a href="#"><b>Loans History</b></a>
        </div>
        <br>
        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <div class="table-container">
                        <table class="loans-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Book Title</th>
                                    <th>Loans Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Corrected SQL query
                            $sql = "SELECT * FROM history";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>".$row["id"]."</td>
                                            <td>".$row["name"]."</td>
                                            <td>".$row["title"]."</td>
                                            <td>".$row["loans"]."</td>
                                            <td>".$row["returns"]."</td>
                                            <td>".$row["status"]."</td>
                                            <td>
                                                <a href='./editLoans.php?id=".$row["id"]."'><i class='fa fa-pencil-square'></i></a> |
                                                <a href='./controllers/deleteLoans.php?id=".$row["id"]."'><i class='fa fa-book'></i></a>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No history loans found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="viewbtn">
                <a href="#"></i><b>View All</b></a>
        </div>
        <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>
    </div>
</body>

</html>