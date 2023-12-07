<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("connect.php");


    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM users 
            WHERE email ='$email' 
            and 
            password='$password'";

    $result=mysqli_query($con,$sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
        
        $userData = mysqli_fetch_assoc($result);
        $_SESSION["roleID"] = $userData["roleID"];
            
            if ($_SESSION["roleID"] == 1) {
                header("location: ../admin/dash.php");
            }else{
                $_SESSION['userID']=$userData['userID'];
                header("location:../client/home.php");
            }
    }else {
    echo "Invalid data";
}
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

    <form class="  absolute w-[25%] h-[50%] bg-[#b9eca765] rounded-3xl" action="login.php" method="post">
      <h2 class="text-center font-bold text-xl mt-5 text-[#ffffff]">Sgin Up</h2>

      <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5 " type="email" name="email" placeholder="you email ..." required>

      <input class="  text-gray-900 text-sm rounded-lg  w-[80%] p-2.5 "type="password" name="password" placeholder="you password ..." required>


      <input id="btn" class=" text-white bg-green-400 hover:bg-green-900  font-medium text-sm px-5 py-2.5 text-center " type="submit" value="submit">
      <h4>If you  dont have account go to <a href="sgin_up.php"><span>Sgin_Up </span></a></h4>

    </form>
  </div>



</body>

</html>