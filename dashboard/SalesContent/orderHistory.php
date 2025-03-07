<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/dashboard/SalesContent/orderHistory.css">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="card animate-fade-in">
        <div class="card-header">
            <h2 class="card-title">Order History</h2>
            <p class="card-description">View your past orders and their status</p>
        </div>
        <div class="card-content">
            <div class="scroll-area">
                <div class="accordion">
                    <!-- Single Order Item -->
                    <div class="accordion-item">
                        <button class="accordion-trigger">
                            <div class="accordion-header">
                                <div>
                                    <div class="order-id">Order #12345678</div>
                                    <div class="order-date">March 5, 2025 - 2 days ago</div>
                                </div>
                                <div class="order-summary">
                                    <span class="order-total">$125.99</span>
                                    <span class="badge pending">Pending</span>
                                </div>
                            </div>
                        </button>
                        <div class="accordion-content">
                            <div class="order-details">
                                <h4>Client Information</h4>
                                <div class="info-grid">
                                    <div><strong>Company:</strong> ABC Corp</div>
                                    <div><strong>Contact:</strong> John Doe</div>
                                    <div><strong>Phone:</strong> +123456789</div>
                                    <div><strong>Email:</strong> john@example.com</div>
                                    <div class="full-width"><strong>Address:</strong> 123 Main St, City</div>
                                </div>
                            </div>

                            <div class="order-items">
                                <h4>Order Items</h4>
                                <div class="item">
                                    <span>Salmon (2 kg)</span>
                                    <span>$25.98</span>
                                </div>
                                <div class="item">
                                    <span>Tuna (1 unit)</span>
                                    <span>$9.99</span>
                                </div>
                            </div>

                            <div class="order-total-summary">
                                <span>Total</span>
                                <span>$125.99</span>
                            </div>

                            <div class="special-instructions">
                                <h4>Special Instructions</h4>
                                <p>No onions, please.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat accordion-item for more orders -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php


?>