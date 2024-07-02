<?php
session_start();
include('./includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/settings.css">
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
        <h2>Library Settings</h2>
    </div>
    <div class="container-wrapper">
        <?php
        if ($data) {
            if (isset($_POST['update'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $q = "UPDATE users SET 
                    username = '$username', 
                    email = '$email', 
                    password = '$hashed_password' 
                    WHERE id = '$user_id'";

                if (mysqli_query($conn, $q)) {
                    echo "<script>alert('Data Updated Successfully');</script>";
                    $_SESSION['username'] = $username; // Update session variable
                    $sql = "SELECT * FROM users WHERE id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($result);
                } else {
                    echo "Error: " . $q . "<br>" . mysqli_error($conn);
                }
            }
            ?>
            <form action="" method="post">
                ID : <input type="text" id="id" name="id" value="<?php echo $data['id']; ?>" readonly><br>
                Username : <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" ><br>
                Email : <input type="text" id="email" name="email" value="<?php echo $data['email']; ?>" ><br>
                Password: <input type="text" id="password" name="password">
                <input type="checkbox" id="showPassword" onclick="myFunction()"> Show Password
                <button type="submit" name="update">Update</button>
            </form>
            <?php
        } else {
            echo "Data not found.";
        }
        ?>
    </div>
    <script src="js/main.js">
    </script>
</body>
</html>
