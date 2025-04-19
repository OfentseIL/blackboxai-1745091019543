<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UniTrade</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        :root {
            --color-primary: #0118D8;
            --color-secondary: #FF8000;
            --color-accent: #DCE4C9;
            --color-white: #FFFFFF;
            --color-black: #000000;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-black">
    <header class="bg-[var(--color-primary)] text-white shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
            <a href="index.php" class="flex items-center space-x-2">
                <img src="assets/images/university-logo.png" alt="University Logo" class="h-10 w-10 object-contain" />
                <span class="text-xl font-bold">UniTrade</span>
            </a>
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="index.php" class="hover:text-[var(--color-secondary)] transition">Home</a>
                <a href="about.php" class="hover:text-[var(--color-secondary)] transition">About</a>
                <a href="shop.php" class="hover:text-[var(--color-secondary)] transition">Shop</a>
                <a href="faq.php" class="hover:text-[var(--color-secondary)] transition">FAQ</a>
                <a href="search.php" class="hover:text-[var(--color-secondary)] transition">
                    <i class="fas fa-search"></i>
                </a>
                <a href="wishlist.php" class="hover:text-[var(--color-secondary)] transition relative">
                    <i class="fas fa-heart"></i>
                    <span class="absolute -top-2 -right-2 bg-[var(--color-secondary)] text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                </a>
                <a href="cart.php" class="hover:text-[var(--color-secondary)] transition relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="absolute -top-2 -right-2 bg-[var(--color-secondary)] text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                </a>
                <a href="profile.php" class="hover:text-[var(--color-secondary)] transition">
                    <i class="fas fa-user"></i>
                </a>
            </nav>
            <div class="md:hidden">
                <button id="mobile-menu-button" aria-label="Toggle menu" class="focus:outline-none">
                    <i class="fas fa-bars text-white text-2xl"></i>
                </button>
            </div>
        </div>
        <nav id="mobile-menu" class="hidden bg-[var(--color-primary)] px-4 pb-4 md:hidden">
            <a href="index.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Home</a>
            <a href="about.php" class="block py-2 hover:text-[var(--color-secondary)] transition">About</a>
            <a href="shop.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Shop</a>
            <a href="faq.php" class="block py-2 hover:text-[var(--color-secondary)] transition">FAQ</a>
            <a href="search.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Search</a>
            <a href="wishlist.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Wishlist</a>
            <a href="cart.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Cart</a>
            <a href="profile.php" class="block py-2 hover:text-[var(--color-secondary)] transition">Profile</a>
        </nav>
    </header>
    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
