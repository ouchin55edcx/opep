<style>
    .category-card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .category-card:hover {
        transform: scale(1.05);
    }

    .category-image {
        height: 200px;
        background-color: #f0f0f0;
    }

    .category-content {
        padding: 1rem;
    }

    .category-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }

    .category-description {
        margin-top: 0.5rem;
        color: #666;
    }
</style>
<header class="relative bg-white">
    <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
            <div class="flex h-16 items-center">

                <!-- Flyout menus -->
                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="flex h-full space-x-8">
                        <a href="home.php" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Homme</a>
                        <a href="product.php" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Product</a>
                    </div>
                </div>

                <div class='max-w-md mx-auto'>
                    <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                        <form action="" method="post">
                            <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" name="search" placeholder="Search something.." />
                            <button type="submit">
                                <div class="grid place-items-center h-full w-12 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="ml-auto flex items-center">
                    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                        <a href="logout.php" class="text-sm font-medium text-gray-700 hover:text-gray-800">Logout</a>
                        <a href="panier.php" class="text-sm font-medium text-gray-700 hover:text-gray-800">panier</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>