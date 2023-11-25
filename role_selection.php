<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $selectedRoleId = $_POST["role"];

    // Validate the selected role (optional)
    $validRoles = [1, 2]; // Adjust based on your predefined roles
    if (!in_array($selectedRoleId, $validRoles)) {
        echo "Invalid role selected";
        exit();
    }

    // Update user role in the users table
    $sql = "UPDATE users SET role_id = $selectedRoleId WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$title = 'Role Selection';
include './tmp/head.php'
?>

    <h2>Select Your Role</h2>
    <form action='' method='post' onsubmit="return validateForm()">
    <input type='hidden' name='email' value='<?php echo $_SESSION['email']; ?>'>
    <label for='role'>Select Role:</label>
    <input style="display: none;" type="radio" value="1" name="role" id="admin">
    <input style="display: none;" type="radio" value="2" name="role" id="client">
    <span onclick="clickInInput('admin')" style="cursor: pointer;">admin</span>
    <span onclick="clickInInput('client')" style="cursor: pointer;">client</span>

    <input type='submit' value='Submit'>
</form>

<?php include './tmp/footer.php'?>