// Enhanced AI-powered product recommendations using TensorFlow.js with user behavior data

document.addEventListener('DOMContentLoaded', () => {
    const recommendationsContainer = document.getElementById('recommendations');

    // Simulated product data
    const products = [
        { id: 1, name: 'Used Textbook: Calculus', price: 25, image: 'https://via.placeholder.com/150?text=Calculus+Textbook' },
        { id: 2, name: 'Study Notes: Physics', price: 10, image: 'https://via.placeholder.com/150?text=Physics+Notes' },
        { id: 3, name: 'Lab Coat', price: 30, image: 'https://via.placeholder.com/150?text=Lab+Coat' },
        { id: 4, name: 'Scientific Calculator', price: 40, image: 'https://via.placeholder.com/150?text=Calculator' },
        { id: 5, name: 'Used Textbook: Chemistry', price: 20, image: 'https://via.placeholder.com/150?text=Chemistry+Textbook' },
        { id: 6, name: 'USB Flash Drive', price: 15, image: 'https://via.placeholder.com/150?text=USB+Drive' }
    ];

    // Simple TensorFlow.js model for demonstration: recommend products similar to recently viewed
    async function loadModel() {
        // For demonstration, no actual model is loaded
        // In real scenario, load a pre-trained model here
        return {
            predict: (input) => {
                // Return top 4 products excluding recently viewed
                const viewedSet = new Set(input);
                return products.filter(p => !viewedSet.has(p.id)).slice(0, 4);
            }
        };
    }

    async function fetchUserBehavior() {
        try {
            const response = await fetch('api/user_behavior.php');
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            return data.product_views || [];
        } catch (error) {
            console.error('Failed to fetch user behavior:', error);
            return [];
        }
    }

    async function renderRecommendations() {
        const userBehavior = await fetchUserBehavior();
        const model = await loadModel();
        const recommendedProducts = model.predict(userBehavior);

        recommendationsContainer.innerHTML = '';
        recommendedProducts.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'border rounded-lg p-4 shadow hover:shadow-lg transition cursor-pointer bg-white';
            productCard.innerHTML = `
                <img src="${product.image}" alt="${product.name}" class="w-full h-40 object-cover mb-3 rounded" />
                <h3 class="text-lg font-semibold mb-1">${product.name}</h3>
                <p class="text-[var(--color-primary)] font-bold">$${product.price}</p>
            `;
            recommendationsContainer.appendChild(productCard);
        });
    }

    renderRecommendations();
});
