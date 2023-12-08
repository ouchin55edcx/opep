  <?php

  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connect.php");

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql =  "INSERT INTO users (first_name,last_name,email,password) 
    VALUES ('$first_name','$last_name','$email','$password')";

    $result = mysqli_query($con, $sql);
    if ($result) {
      $_SESSION['email'] = $email;
      header('location:role.php');
    } else {
      die(mysqli_error($con));
    }
  }
  ?>



  <!doctype html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
    <h1 class="text-6xl font-bold text-white text-center my-10">
      Jardin Botanique </h1>


    <div class="flex justify-center my-24 ">

      <form class="  absolute w-[25%] h-[65%] bg-[#b9eca765] rounded-3xl" action="sgin_up.php" method="post">
        <h2 class="text-center font-bold text-xl mt-5 text-[#ffffff]">Sgin Up</h2>

        <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5  " type='text' name='first_name' placeholder='you first name ...' required>

        <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5 " type='text' name="last_name" placeholder="you last name ..." required>

        <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5  " type='email' name="email" placeholder="you email name ..." required>

        <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5 " type="password" name="password" placeholder="you password ..." required>


        <button id="btn" class=" text-white bg-green-400 hover:bg-green-900  font-medium text-sm px-5 py-2.5 text-center " type="submit" >submit</button>
        <h4>Are have account go to <a href="login.php"><span> Login </span></a></h4>

      </form>
    </div>



  </body>

  </html>