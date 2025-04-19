<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// For demonstration, static wishlist items
$wishlist = [
    ['id' => 1, 'name' => 'Used Textbook: Calculus', 'price' => 25, 'image' => 'https://via.placeholder.com/150?text=Calculus+Textbook'],
    ['id' => 3, 'name' => 'Lab Coat', 'price' => 30, 'image' => 'https://via.placeholder.com/150?text=Lab+Coat']
];
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Wishlist</h1>
    <?php if (empty($wishlist)): ?>
        <p>Your wishlist is empty.</p>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($wishlist as $item): ?>
                <div class="border rounded-lg p-4 shadow hover:shadow-lg transition bg-white">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-full h-40 object-cover mb-3 rounded" />
                    <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($item['name']) ?></h3>
                    <p class="text-[var(--color-primary)] font-bold mb-2">$<?= number_format($item['price'], 2) ?></p>
                    <button class="w-full bg-[var(--color-secondary)] text-white py-2 rounded hover:bg-[var(--color-primary)] transition">Add to Cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php include 'footer.php'; ?>
