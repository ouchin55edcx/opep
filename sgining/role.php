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


    <section class="">
        <h2 class="text-3xl font-bold text-green-400 text-center absolute top-[32%] right-[27%]">client</h2>
        <h2 class="text-3xl font-bold text-green-400 absolute top-[32%] left-[27%]">admin</h2>


        <a id="btn1" href="/stor/sgining/role.php?role=2" type="submit" class=" absolute top-[40%] right-[20%] w-[20%] h-[50%] bg-[#b9eca765] rounded-3xl hover:bg-green-500" name="client">
        </a>
        <a id="btn2" href="/stor/sgining/role.php?role=1" type="submit" class="absolute top-[40%] left-[20%] w-[20%] h-[50%] bg-[#b9eca765] rounded-3xl hover:bg-green-500" name="admin" placeholder="client">
        </a>


    </section>

    <?php
    session_start();
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["role"])) {
            $email = $_SESSION["email"];
            $roleID = $_GET["role"];

            $sql =  "UPDATE users
            SET roleID  = $roleID
            WHERE email  = '$email' ";

            $result = mysqli_query($con, $sql);
            header("location:login.php");

        }
    }

    ?>

</body>

</html>