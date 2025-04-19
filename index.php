<?php include 'header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <section class="mb-12">
        <h1 class="text-4xl font-bold text-[var(--color-primary)] mb-4">Welcome to UniTrade</h1>
        <p class="text-lg text-gray-700 max-w-3xl">
            Buy and sell used textbooks, study notes, electronics, lab instruments, and more. Join our community of students and make your university life easier and more affordable.
        </p>
    </section>

    <section>
        <h2 class="text-2xl font-semibold text-[var(--color-secondary)] mb-6">Recommended for You</h2>
        <div id="recommendations" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- AI-powered product recommendations will be rendered here -->
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>

<!-- TensorFlow.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.20.0/dist/tf.min.js"></script>
<script src="assets/js/recommendations.js"></script>
</body>
</html>
