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

<section class="bg-green-200 h-screen flex items-center justify-center">
  <div class="bg-white  rounded-lg shadow-lg p-8 max-w-md w-full">
    <div class="text-center">
      <h2 class="text-2xl font-semibold mb-4 text-green-600">Select Your Role</h2>
    </div>
    <form action="" method="post" onsubmit="return validateForm()">
      <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
      <div class="grid grid-cols-2 gap-4">
        <!-- Admin card -->
        <div onclick="clickInInput('admin')" class="cursor-pointer p-4 border border-green-300 dark:border-green-700 rounded-md bg-[#50B041]  hover:bg-green-100  transition duration-200">
          <input type="radio" value="1" name="role" id="admin" class="hidden" required>
          <label for="admin" class="block text-center font-bold text-xl text-white hover:dark:text-black ">Admin</label>
        </div>

        <!-- Client card -->
        <div onclick="clickInInput('client')" class="cursor-pointer p-4 border border-green-300 dark:border-green-700 rounded-md bg-[#50B041]   hover:bg-green-100 transition duration-200">
          <input type="radio" value="2" name="role" id="client" class="hidden"required>
          <label for="client" class="block text-center font-bold text-xl text-white hover:dark:text-black ">Client</label>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="py-2 px-4 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:border-green-400">Submit</button>
      </div>
    </form>
  </div>
</section>



<script>
    function clickInInput(input){
    inputHTML = document.getElementById(input)
    inputHTML.click()
}
</script>

<?php include './tmp/footer.php'?>