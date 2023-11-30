<?php
include 'head.php'; ?>
<div class="bg-blue-500">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
        <a class="text-3xl font-bold leading-none" href="#">
            <svg class="h-10" alt="logo" viewBox="0 0 10240 10240">
            </svg>
        </a>
        <h1>title her </h1>
        <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="home.php">Home</a></li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="http://localhost/test/products.php?category_id=99">Products</a></li>
        </ul>




        <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="user_comments.php">Panier</a>
        <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="logout.php">Logout</a>
        <!-- Search bar -->

    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <!-- Your mobile menu content here -->
    </div>
</div>
<div class="my-4 text-center">
    <form method="get" action="products.php">
        <input class="px-4 py-2 border rounded" type="text" placeholder="Search by product name" name="query">
        <button class="px-4 py-2 bg-green-500 text-white rounded" type="submit">Search</button>
    </form>
</div>