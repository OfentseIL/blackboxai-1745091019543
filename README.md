
Built by https://www.blackbox.ai

---

```markdown
# UniTrade

UniTrade is a student-focused marketplace designed to help university students buy and sell used textbooks, study notes, electronics, lab instruments, and more. Our mission is to make university life more affordable and convenient by connecting students within the community. This platform also utilizes AI for personalized product recommendations.

## Project Overview

UniTrade provides functionalities for user registration, login, product browsing, adding items to a wishlist and shopping cart, and a simple checkout process. The application features a responsive design using Tailwind CSS, and employs secure password storage for user accounts.

## Installation

To set up UniTrade locally, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone <repository_url>
   ```

2. **Set up the database:**
   - Create a new database in your SQL environment.
   - Adjust the database connection settings in `includes/db.php`.

3. **Start a local server:**
   - For local development, you can use tools like XAMPP, WAMP, or MAMP to host PHP applications.
   - Move the project files to the appropriate `htdocs` directory for XAMPP or WAMP.

4. **Access the application:**
   - Open your web browser and navigate to `http://localhost/UniTrade`.

## Usage

1. **Registration**: 
   - Navigate to `register.php` to create a new account. Choose a role as either a buyer or seller.

2. **Login**:
   - Go to `login.php` to access your account.

3. **Shop**:
   - Browse available products by visiting the `shop.php` page.

4. **Wishlist**:
   - Add items to your wishlist on the `wishlist.php` page.

5. **Cart**:
   - Manage your selected products in the cart accessible from `cart.php`.

6. **Checkout**:
   - Proceed to payment through the `checkout.php` page after adding items to your cart.

## Features

- User registration and authentication with role selection (buyer/seller).
- Browsing of products with AI-powered recommendations.
- A dynamic shopping cart that calculates totals.
- Wishlist to save items for later purchase.
- Secure payment processing with form validation.

## Dependencies

The project includes the following dependencies:

- **Tailwind CSS**: For responsive styling.
- **Font Awesome**: For icons.
- **TensorFlow.js**: Used for AI-powered product recommendations.

These dependencies are linked directly within the project files via CDN.

## Project Structure

```
UniTrade/
│
├── includes/
│   └── db.php                 # Database connection file
│
├── assets/
│   └── images/                # Directory for image assets
│
├── header.php                 # Header HTML component
├── footer.php                 # Footer HTML component
├── index.php                  # Home page
├── about.php                  # About page
├── faq.php                    # FAQ page
├── login.php                  # Login page
├── logout.php                 # Logout functionality
├── profile.php                # User profile page
├── register.php               # User registration page
├── shop.php                   # Shop page for product listings
├── wishlist.php               # Wishlist page
├── cart.php                   # Shopping cart page
└── checkout.php               # Checkout page for payment processing
```

## License

This project is open-source and available under the [MIT License](LICENSE).
```