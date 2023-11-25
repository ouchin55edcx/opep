<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    // $password = $_POST["password"];
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
    <h2>Signup</h2>
    <form action="" method="post">
        <label for="firstName">first name:</label>
        <input type="text" name="firstName" required><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" value="Signup">
        
    </form>
    <a href="./login.php">login</a>
<?php include './tmp/footer.php'?>+