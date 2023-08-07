<?php
session_start();
include('../includes/conn.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $query = "SELECT * FROM login WHERE USERNAME = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row['PASSWORD']) {
            $_SESSION['loggedin'] = true;
            header("location: index.php");
            exit;
        } else {
            $login_error = "Invalid username or password";
        }
    } else {
        $login_error = "Invalid username or password";
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

<h2>Login</h2>
<form method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="username" autocomplete="off"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" autocomplete="off"><br>
    <input type="submit" value="Login">
</form>
<?php
if (isset($login_error)) {
    echo "<p style='color:red;'>$login_error</p>";
}
?>

</body>
</html>
