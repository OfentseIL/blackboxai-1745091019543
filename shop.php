<?php
session_start();
include 'includes/db.php';

// For demonstration, static product list
$products = [
    ['id' => 1, 'name' => 'Used Textbook: Calculus', 'price' => 25, 'image' => 'https://via.placeholder.com/150?text=Calculus+Textbook'],
    ['id' => 2, 'name' => 'Study Notes: Physics', 'price' => 10, 'image' => 'https://via.placeholder.com/150?text=Physics+Notes'],
    ['id' => 3, 'name' => 'Lab Coat', 'price' => 30, 'image' => 'https://via.placeholder.com/150?text=Lab+Coat'],
    ['id' => 4, 'name' => 'Scientific Calculator', 'price' => 40, 'image' => 'https://via.placeholder.com/150?text=Calculator'],
    ['id' => 5, 'name' => 'Used Textbook: Chemistry', 'price' => 20, 'image' => 'https://via.placeholder.com/150?text=Chemistry+Textbook'],
    ['id' => 6, 'name' => 'USB Flash Drive', 'price' => 15, 'image' => 'https://via.placeholder.com/150?text=USB+Drive']
];
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Shop</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($products as $product): ?>
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition bg-white">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-40 object-cover mb-3 rounded" />
                <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                <p class="text-[var(--color-primary)] font-bold mb-2">$<?= number_format($product['price'], 2) ?></p>
                <button class="w-full bg-[var(--color-secondary)] text-white py-2 rounded hover:bg-[var(--color-primary)] transition">Add to Cart</button>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php include 'footer.php'; ?>
