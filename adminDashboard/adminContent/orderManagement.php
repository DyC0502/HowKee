<?php
// Mock orders data (simulate database results)
$orders = [
    [
        "id" => "ORD12345678",
        "clientInfo" => [
            "name" => "John Doe",
            "contactPerson" => "John Doe",
            "phone" => "+1 234 567 890",
            "address" => "123 Main St, City, Country"
        ],
        "createdAt" => "2025-03-07 14:35:00",
        "status" => "Processing",
        "items" => [
            ["productId" => 1, "quantity" => 2, "unitPrice" => 25.00],
            ["productId" => 2, "quantity" => 1, "unitPrice" => 15.50]
        ],
        "total" => 65.50
    ],
    [
        "id" => "ORD98765432",
        "clientInfo" => [
            "name" => "Jane Smith",
            "contactPerson" => "Jane Smith",
            "phone" => "+1 987 654 321",
            "address" => "456 Another Rd, Town, Country"
        ],
        "createdAt" => "2025-03-06 10:20:00",
        "status" => "Completed",
        "items" => [
            ["productId" => 3, "quantity" => 3, "unitPrice" => 12.75]
        ],
        "total" => 38.25
    ]
];

// Mock product database
$products = [
    1 => ["name" => "Product A", "unit" => "pcs"],
    2 => ["name" => "Product B", "unit" => "pcs"],
    3 => ["name" => "Product C", "unit" => "pcs"]
];

$statusColors = [
    "Submitted" => "status-submitted",
    "Processing" => "status-processing",
    "Completed" => "status-completed",
    "Cancelled" => "status-cancelled"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="/adminDashboard/adminContent/orderManagement.css">
</head>
<body>
<div class="order-management">
    <div class="order-header">
        <div class="header-title">
            <h2>Order Management</h2>
            <p class="sub-text">View and manage all orders in the system</p>
        </div>
        <div class="filters">
            <input type="text" id="search" placeholder="Search orders..." onkeyup="filterOrders()">
            <select id="statusFilter" onchange="filterOrders()">
                <option value="all">All Status</option>
                <option value="Submitted">Submitted</option>
                <option value="Processing">Processing</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <div id="orderList">
        <?php if (empty($orders)): ?>
            <p class="no-orders">No orders have been placed yet</p>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="order-card" data-status="<?= $order['status'] ?>">
                    <div class="order-card-header">
                        <div>
                            <h3><?= $order['clientInfo']['name'] ?></h3>
                            <p class="order-id">Order ID: <?= substr($order['id'], 0, 8) ?></p>
                            <p class="order-date">Created: <?= date("Y-m-d H:i", strtotime($order['createdAt'])) ?></p>
                        </div>
                        <span class="status <?= $statusColors[$order['status']] ?>"><?= $order['status'] ?></span>
                    </div>

                    <div class="order-details">
                        <h4>Order Details</h4>
                        <p><strong>Contact:</strong> <?= $order['clientInfo']['contactPerson'] ?></p>
                        <p><strong>Phone:</strong> <?= $order['clientInfo']['phone'] ?></p>
                        <p><strong>Delivery Address:</strong> <?= $order['clientInfo']['address'] ?></p>
                    </div>

                    <div class="items">
                        <h4>Items</h4>
                        <ul>
                            <?php foreach ($order['items'] as $item): ?>
                                <?php $product = $products[$item['productId']] ?? null; ?>
                                <?php if ($product): ?>
                                    <li>
                                        <span class="item-name"><?= $product['name'] ?> (<?= $item['quantity'] ?> <?= $product['unit'] ?>)</span>
                                        
                                        <span class="item-price">$<?= number_format($item['unitPrice'] * $item['quantity'], 2) ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="total">
                        <strong>Total:</strong> <span class="total-price">$<?= number_format($order['total'], 2) ?></span>
                    </div>

                    <div class="actions">
                        <button class="btn-outline">View Details</button>
                        <button class="btn-primary">Update Status</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
function filterOrders() {
    let searchQuery = document.getElementById("search").value.toLowerCase();
    let statusFilter = document.getElementById("statusFilter").value;
    let orders = document.querySelectorAll(".order-card");

    orders.forEach(order => {
        let clientName = order.querySelector("h3").innerText.toLowerCase();
        let status = order.getAttribute("data-status");

        if ((clientName.includes(searchQuery) || searchQuery === "") &&
            (status === statusFilter || statusFilter === "all")) {
            order.style.display = "block";
        } else {
            order.style.display = "none";
        }
    });
}
</script>

</body>
</html>
