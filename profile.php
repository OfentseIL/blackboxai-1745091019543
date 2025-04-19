<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username, email, role FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold text-[var(--color-primary)] mb-6">Profile</h1>
    <div class="bg-[var(--color-accent)] p-6 rounded shadow">
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars(ucfirst($user['role'])) ?></p>
        <a href="logout.php" class="inline-block mt-4 bg-[var(--color-primary)] text-white py-2 px-4 rounded hover:bg-[var(--color-secondary)] transition">Logout</a>
    </div>
</main>
<?php include 'footer.php'; ?>
