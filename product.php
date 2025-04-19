<?php
session_start();
include 'includes/db.php';

if (!isset($_GET['id'])) {
    header('Location: shop.php');
    exit;
}

$product_id = (int)$_GET['id'];

// Fetch product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Product not found.";
    exit;
}

// Record product view if user logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("INSERT INTO user_product_views (user_id, product_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $product_id]);
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="flex flex-col md:flex-row gap-6">
        <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full md:w-1/2 h-auto rounded" />
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-4"><?= htmlspecialchars($product['name']) ?></h1>
            <p class="mb-4"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
            <p class="text-xl font-semibold text-[var(--color-secondary)] mb-6">$<?= number_format($product['price'], 2) ?></p>
            <button class="bg-[var(--color-primary)] text-white py-2 px-6 rounded hover:bg-[var(--color-secondary)] transition">Add to Cart</button>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
