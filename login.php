<?php
session_start();
include 'includes/db.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (!$password) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Login</h1>
    <?php if ($errors): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" action="login.php" class="space-y-4 bg-[var(--color-accent)] p-6 rounded shadow">
        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
        </div>
        <div>
            <label for="password" class="block font-semibold mb-1">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded" />
        </div>
        <button type="submit" class="w-full bg-[var(--color-primary)] text-white py-2 rounded hover:bg-[var(--color-secondary)] transition">Login</button>
    </form>
    <p class="mt-4 text-center">
        Don't have an account? <a href="register.php" class="text-[var(--color-primary)] hover:underline">Register here</a>.
    </p>
</main>
<?php include 'footer.php'; ?>
