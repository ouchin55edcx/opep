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