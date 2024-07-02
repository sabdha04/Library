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
    <link rel="stylesheet" href="./css/members.css">
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
            <h2>Member List</h2>
            <div class="search-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                    <div class="input-wrapper">
                        <input type="text" placeholder="Search for members.." name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="dropdown">
                <button class="dropbtn">All Category <i class="fa fa-caret-down" style="margin-left:20px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
        <br>
        <div class="tambahbtn">
            <a href="./pages/addMember.php"><i class="fa fa-plus"></i><b> Add Member</b></a>
        </div>
        <br>
        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <table class="member-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $sql = "SELECT * FROM members WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR address LIKE '%$search%'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$row["id"]."</td>
                                        <td>".$row["name"]."</td>
                                        <td>".$row["email"]."</td>
                                        <td>".$row["phone"]."</td>
                                        <td>".$row["address"]."</td>
                                        <td>
                                            <a href='./pages/editMember.php?id=".$row["id"]."'><i class='fa fa-pencil-square'></i></a> |
                                            <a href='./controllers/deleteMember.php?id=".$row["id"]."'><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No members found</td></tr>";
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
