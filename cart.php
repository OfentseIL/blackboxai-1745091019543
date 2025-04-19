<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// For demonstration, static cart items
$cart = [
    ['id' => 2, 'name' => 'Study Notes: Physics', 'price' => 10, 'quantity' => 1, 'image' => 'https://via.placeholder.com/150?text=Physics+Notes'],
    ['id' => 4, 'name' => 'Scientific Calculator', 'price' => 40, 'quantity' => 1, 'image' => 'https://via.placeholder.com/150?text=Calculator']
];

function calculateTotal($items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Shopping Cart</h1>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-[var(--color-accent)]">
                    <th class="border border-gray-300 p-2 text-left">Product</th>
                    <th class="border border-gray-300 p-2">Price</th>
                    <th class="border border-gray-300 p-2">Quantity</th>
                    <th class="border border-gray-300 p-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td class="border border-gray-300 p-2 flex items-center space-x-4">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-16 h-16 object-cover rounded" />
                            <span><?= htmlspecialchars($item['name']) ?></span>
                        </td>
                        <td class="border border-gray-300 p-2 text-center">$<?= number_format($item['price'], 2) ?></td>
                        <td class="border border-gray-300 p-2 text-center"><?= $item['quantity'] ?></td>
                        <td class="border border-gray-300 p-2 text-center">$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="font-bold bg-[var(--color-accent)]">
                    <td colspan="3" class="border border-gray-300 p-2 text-right">Total</td>
                    <td class="border border-gray-300 p-2 text-center">$<?= number_format(calculateTotal($cart), 2) ?></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-6 text-right">
            <a href="checkout.php" class="inline-block bg-[var(--color-primary)] text-white py-2 px-6 rounded hover:bg-[var(--color-secondary)] transition">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</main>
<?php include 'footer.php'; ?>
