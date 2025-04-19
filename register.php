<?php
session_start();
include 'includes/db.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = $_POST['role'] ?? '';

    if (!$username) {
        $errors[] = "Username is required.";
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (!$password) {
        $errors[] = "Password is required.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (!in_array($role, ['buyer', 'seller'])) {
        $errors[] = "Please select a valid role.";
    }

    if (empty($errors)) {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = "Email is already registered.";
        } else {
            // Insert user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashed_password, $role])) {
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                header('Location: index.php');
                exit;
            } else {
                $errors[] = "Registration failed. Please try again.";
            }
        }
    }
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Register</h1>
    <?php if ($errors): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" action="register.php" class="space-y-4 bg-[var(--color-accent)] p-6 rounded shadow">
        <div>
            <label for="username" class="block font-semibold mb-1">Username</label>
            <input type="text" id="username" name="username" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
        </div>
        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
        </div>
        <div>
            <label for="password" class="block font-semibold mb-1">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded" />
        </div>
        <div>
            <label for="confirm_password" class="block font-semibold mb-1">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required class="w-full p-2 border border-gray-300 rounded" />
        </div>
        <div>
            <label class="block font-semibold mb-1">Register as</label>
            <select name="role" required class="w-full p-2 border border-gray-300 rounded">
                <option value="">Select role</option>
                <option value="buyer" <?= (($_POST['role'] ?? '') === 'buyer') ? 'selected' : '' ?>>Buyer</option>
                <option value="seller" <?= (($_POST['role'] ?? '') === 'seller') ? 'selected' : '' ?>>Seller</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-[var(--color-primary)] text-white py-2 rounded hover:bg-[var(--color-secondary)] transition">Register</button>
    </form>
    <p class="mt-4 text-center">
        Already have an account? <a href="login.php" class="text-[var(--color-primary)] hover:underline">Login here</a>.
    </p>
</main>
<?php include 'footer.php'; ?>
