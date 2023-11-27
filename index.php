<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password,firstName,lastName) VALUES ('$email', '$password','$firstName','$lastName')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        header("Location: role_selection.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
$title = 'Signup Page';
include './tmp/head.php'


?>
<section class=" bg-green-200 h-screen flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
    <div class="text-center">
      <h2 class="text-2xl font-semibold mb-4 text-green-600">Signup</h2>
    </div>
    <form action="" method="post">
      <div class="mb-4">
        <label for="firstName" class="block text-sm font-medium text-gray-600 dark:text-gray-400">First Name:</label>
        <input type="text" name="firstName" id="firstName" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="mb-4">
        <label for="lastName" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Last Name:</label>
        <input type="text" name="lastName" id="lastName" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Email:</label>
        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Password:</label>
        <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-green-400" required>
      </div>

      <div class="text-center">
        <button type="submit" class="py-2 px-4 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:border-green-400">Signup</button>
      </div>
    </form>
  </div>
</section>







<?php include './tmp/footer.php' ?>