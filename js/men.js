document.addEventListener('DOMContentLoaded', function () {
    // Add to Cart
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id'); // Use data-product-id for cart
            addToCart(productId);
        });
    });

    // Add to Favorites
    document.querySelectorAll('.add-to-favorites').forEach(button => {
        button.addEventListener('click', function () {
            const productTitle = this.getAttribute('data-product-name'); // Keep data-product-name for favorites
            addToFavorites(productTitle);
        });
    });
});

// Add to Cart Function
function addToCart(productId) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`  // Send the product ID
    })
    .then(response => response.json())  // Parse the JSON response
    .then(data => {
        if (data.success) {
            alert(data.message);  // Show success message
            updateCartList();  // Optionally, update the cart UI
        } else {
            alert(data.message);  // Show error message
        }
    })
    .catch(error => {
        console.error('Error adding to cart:', error);
        alert('An error occurred while adding to the cart.');
    });
}

// Add to Favorites Function
let favorites = [];
function addToFavorites(title) {
    if (!favorites.includes(title)) {
        favorites.push(title);
        updateFavorites();
    } else {
        alert(`${title} is already in your favorites!`);
    }
}

// Update Favorites UI (e.g., modal or list)
function updateFavorites() {
    const favoriteItems = document.getElementById('favoriteItems');
    favoriteItems.innerHTML = '';
    favorites.forEach(item => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = item;
        favoriteItems.appendChild(li);
    });
}

// Function to update the cart modal
function updateCartList() {
    fetch('get_cart_items.php')  // Assuming you have a PHP endpoint to get cart items
        .then(response => response.json())
        .then(data => {
            const cartList = document.getElementById('cart-list');
            cartList.innerHTML = '';  // Clear current list
            data.cartItems.forEach(item => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = `${item.product_name} (x${item.quantity}) - $${item.price}`;
                cartList.appendChild(li);
            });
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
}
