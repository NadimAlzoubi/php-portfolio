<?php
session_start();
include('../includes/conn.php');

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $id = $_POST['id'];
    $query1 = "UPDATE login SET USERNAME='$username', PASSWORD='$password' WHERE ID = $id";
    if(mysqli_query($connect, $query1)){
        echo '<script>alert("Updated successfully!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>
<body>

<h2>Edit</h2>
<form method="post">
    <?php

        $query = "SELECT * FROM login";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($result)) {
    ?>
    
            <label for="username">Username:</label><br>
            <input type="text" value="<?php echo $row['USERNAME']; ?>" name="username" autocomplete="off"><br>
            <label for="password">Password:</label><br>
            <input type="text" value="<?php echo $row['PASSWORD']; ?>" name="password" autocomplete="off"><br>
            <input type="hidden" value="<?php echo $row['ID']; ?>" name="id">
            <input type="submit" value="Update">
    <?php        
        }
    ?>
</form>
<a href="index.php">Back to home</a>
<?php
if (isset($login_error)) {
    echo "<p style='color:red;'>$login_error</p>";
}
?>

</body>
</html>
