<?php
include './connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    if ($user = mysqli_fetch_assoc($query) && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['userId'] = $user['id'];
        $_SESSION['role_id'] = $user['role_id'];

        $redirect = ($user['role_id'] == 1) ? 'admin/dashboard.php' : './home.php';

        header("Location: $redirect");
        exit();
    } else {
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}

$title = 'Login Page';
include './tmp/head.php';
?>

<section class="bg-green-200 h-screen flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
    <div class="text-center">
      <h2 class="text-2xl font-semibold mb-4 text-green-600">Login</h2>
    </div>
    <form action="" method="post">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
        <input type="email" name="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
        <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="text-center">
        <button type="submit" class="py-2 px-4 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:border-green-400">Login</button>
      </div>
    </form>
  </div>
</section>

<?php include './tmp/footer.php'?>
