<?php
include './connect.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start(); // Start the session if it's not already started
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Error: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($query);
    if ($user != '' && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        $Role = $user['role_id'];
        $_SESSION['role_id'] = $Role;

        if ($Role == 1) {
            header('Location: admin/dashboard.php');
            exit(); // Make sure to exit after header redirect
        } else {
            header('Location: ./home.php');
            exit(); // Make sure to exit after header redirect
        }
    } else {
        // Display an alert message for invalid credentials
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}

$title = 'Login Page';
include './tmp/head.php';
?>
<h2>Login</h2>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
</form>
<?php include './tmp/footer.php'?>
