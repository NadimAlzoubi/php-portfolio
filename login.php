<?php

// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // If the user is already logged in, redirect to the dashboard
    header('Location: ./dashbord_admin/index.php');
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the form data

    // Check if the username and password are correct
    if ($_POST['username'] == 'admin' && $_POST['password'] == '1234') {
        // If the username and password are correct, set the session variable
        $_SESSION['logged_in'] = true;

        // Redirect to the dashboard
        header('Location: ./dashbord_admin/index.php');
        exit;
    } else {
        // If the username and password are incorrect, show an error message
        $error_message = 'Invalid username or password.';
    }
}

?>

<!doctype html>
<html>
    <head>
        <title>Admin Login</title>
    </head>
    <body>
        <h1>Admin Login</h1>

        <?php if (isset($error_message)) { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Username: <input type="text" name="username"></label>
            <label>Password: <input type="password" name="password"></label>
            <input type="submit" value="Log In">
        </form>
    </body>
</html>




<!-- To block hotlinks, you can use the .htaccess file to restrict access to the images on your website. Here is an example of how you can do that:
----------------------------------------
RewriteEngine on
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?yourwebsite.com [NC]
RewriteRule \.(jpg|jpeg|png|gif)$ - [NC,F,L]
---------------------
In this example, we are blocking direct access to images with the file extensions .jpg, .jpeg, .png, and .gif if the request doesn't come from your website (yourwebsite.com). This will prevent other websites from hotlinking to your images. -->