// Assuming product data is available in a global variable 'products' (replace with your data source)

const cart = []; // Array to store cart items

// Add to Cart functionality
function addToCart(products) {
  const product = products.find(product => product.id === productId);
  if (product) {
    cart.push(product);
    updateCartCount(); // Update cart badge
  }
}

// Update cart badge in the UI
function updateCartCount() {
  const cartCountElement = document.querySelector('.cart-count');
  cartCountElement.textContent = cart.length;
}

// Filtering and Sorting (client-side)
function filterProducts() {
  const categoryFilter = document.getElementById('category-filter').value;
  const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
  const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;

  let filteredProducts = products; // Start with all products

  // Apply category filter
  if (categoryFilter) {
    filteredProducts = filteredProducts.filter(product => product.category === categoryFilter);
  }

  // Apply price filter
  filteredProducts = filteredProducts.filter(product => product.price >= minPrice && product.price <= maxPrice);

  // Optional: Implement sorting logic based on user selection (e.g., price, rating)

  // Update product list (replace with your DOM manipulation logic)
  const productList = document.querySelector('.products ul');
  productList.innerHTML = ''; // Clear existing products
  filteredProducts.forEach(product => {
    // Create product list item dynamically
    const productItem = document.createElement('li');
    productItem.classList.add('product');
    productItem.innerHTML = `
      <img src="images/${product.image}" alt="${product.name}">
      <h3>${product.name}</h3>
      <p>Price: $${product.price}</p>
      <button data-product-id="${product.id}">Add to Cart</button>
    `;
    productList.appendChild(productItem);
  });

  // Update event listeners for "Add to Cart" buttons
  const addToCartButtons = document.querySelectorAll('.products button');
  addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
      const productId = parseInt(button.dataset.productId);
      addToCart(productId);
    });
  });
}

// Event listeners for filtering controls
document.getElementById('category-filter').addEventListener('change', filterProducts);
document.getElementById('min-price').addEventListener('input', filterProducts);
document.getElementById('max-price').addEventListener('input', filterProducts);

// Image Carousel (using Swiper.js) - Replace with your inclusion of the library
const swiper = new Swiper('.banner', {
  slidesPerView: 3, // Adjust for responsive layout
  spaceBetween: 20,
  loop: true,
  pagination: { el: '.swiper-pagination' },
});

// Call filterProducts() initially to display all products
filterProducts();
