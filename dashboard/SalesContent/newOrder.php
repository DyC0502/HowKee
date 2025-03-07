<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/dashboard/SalesContent/newOrder.css">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="new-order-container">
    <!-- Left Section (Product Selection) -->
    <div class="product-selection">
      <div class="card">
        <h2>Select Products</h2>
        <p>Browse and add products to your cart</p>
        <input type="text" class="search-bar" placeholder="Search products...">

        <!-- Category Tabs -->
        <div class="category-tabs">
          <button class="filter active" data-category="fish">🐟 Fish</button>
          <button class="filter" data-category="shellfish">🦐 Shellfish</button>
        </div>

        <!-- Product Grid (Scrollable) -->
        <div class="product-grid">
          <div class="product-card" data-category="fish">
            <h4>Atlantic Salmon</h4>
            <span class="price">$12.99 / kg</span>
            <h5>Quantity (kg)</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

          <div class="product-card" data-category="fish">
            <h4>Tuna</h4>
            <span class="price">$9.99 / unit</span>
            <h5>Quantity</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

          <div class="product-card" data-category="shellfish">
            <h4>Lobster</h4>
            <span class="price">$18.99 / unit</span>
            <h5>Quantity</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

          <div class="product-card" data-category="shellfish">
            <h4>Shrimp</h4>
            <span class="price">$14.99 / unit</span>
            <h5>Quantity</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

          <div class="product-card" data-category="fish">
            <h4>Cod</h4>
            <span class="price">$11.99 / kg</span>
            <h5>Quantity (kg)</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

          <div class="product-card" data-category="shellfish">
            <h4>Crab</h4>
            <span class="price">$16.99 / unit</span>
            <h5>Quantity</h5>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <h5>Special instructions</h5>
            <textarea class="special-instructions" placeholder="Special instructions..."></textarea>
            <button class="add-btn">Add to Cart</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Right Section (Cart Summary) -->
    <div class="cart-summary">
      <div class="card">
        <h2>Cart Summary</h2>
        <p>Review and submit your order</p>

        <div class="cart-items">
          <div class="cart-item">
            <h4>Atlantic Salmon</h4>
            <span class="price">$12.99</span>
            <input type="number" class="quantity-input" value="1" min="0.1" step="0.1">
            <button class="remove-btn">🗑</button>
          </div>
        </div>

        <div class="cart-footer">
          <p>Total: <span class="total-price">$12.99</span></p>
          <textarea class="cart-notes" placeholder="Add special instructions..."></textarea>
          <button class="checkout-btn">Proceed to Checkout</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>




<?php


?>