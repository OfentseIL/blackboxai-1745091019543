// Placeholder for AI-powered product recommendations using TensorFlow.js
// This example will simulate recommendations for demonstration purposes

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

    // Simulate AI recommendation by randomly selecting 4 products
    function getRecommendations() {
        const shuffled = products.sort(() => 0.5 - Math.random());
        return shuffled.slice(0, 4);
    }

    function renderRecommendations() {
        const recommended = getRecommendations();
        recommendationsContainer.innerHTML = '';
        recommended.forEach(product => {
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
