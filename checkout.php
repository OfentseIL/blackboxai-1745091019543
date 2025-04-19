<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_name = trim($_POST['card_name'] ?? '');
    $card_number = trim($_POST['card_number'] ?? '');
    $expiry = trim($_POST['expiry'] ?? '');
    $cvv = trim($_POST['cvv'] ?? '');

    if (!$card_name) {
        $errors[] = "Cardholder name is required.";
    }
    if (!$card_number || !preg_match('/^\d{16}$/', $card_number)) {
        $errors[] = "Valid 16-digit card number is required.";
    }
    if (!$expiry || !preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiry)) {
        $errors[] = "Valid expiry date (MM/YY) is required.";
    }
    if (!$cvv || !preg_match('/^\d{3}$/', $cvv)) {
        $errors[] = "Valid 3-digit CVV is required.";
    }

    if (empty($errors)) {
        // Simulate payment processing success
        $success = true;
    }
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Checkout</h1>

    <?php if ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            Payment successful! Thank you for your purchase.
        </div>
        <a href="index.php" class="inline-block bg-[var(--color-primary)] text-white py-2 px-6 rounded hover:bg-[var(--color-secondary)] transition">Return to Home</a>
    <?php else: ?>
        <?php if ($errors): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="checkout.php" class="space-y-4 bg-[var(--color-accent)] p-6 rounded shadow">
            <div>
                <label for="card_name" class="block font-semibold mb-1">Cardholder Name</label>
                <input type="text" id="card_name" name="card_name" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['card_name'] ?? '') ?>" />
            </div>
            <div>
                <label for="card_number" class="block font-semibold mb-1">Card Number</label>
                <input type="text" id="card_number" name="card_number" maxlength="16" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['card_number'] ?? '') ?>" />
            </div>
            <div>
                <label for="expiry" class="block font-semibold mb-1">Expiry Date (MM/YY)</label>
                <input type="text" id="expiry" name="expiry" maxlength="5" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['expiry'] ?? '') ?>" />
            </div>
            <div>
                <label for="cvv" class="block font-semibold mb-1">CVV</label>
                <input type="password" id="cvv" name="cvv" maxlength="3" required class="w-full p-2 border border-gray-300 rounded" />
            </div>
            <button type="submit" class="w-full bg-[var(--color-primary)] text-white py-2 rounded hover:bg-[var(--color-secondary)] transition">Pay Now</button>
        </form>
    <?php endif; ?>
</main>
<?php include 'footer.php'; ?>
