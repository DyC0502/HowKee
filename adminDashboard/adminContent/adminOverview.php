<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/adminDashboard/adminContent/adminOverview.css">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="grid-container">
        <!-- Total Orders -->
        <div class="card blue-gradient">
            <div class="card-header">
                <i class="fa-solid fa-shopping-bag"></i>
                <span>Total Orders</span>
            </div>
            <div class="card-content">
                <h3>120</h3>
                <p><i class="fa-solid fa-arrow-up"></i> 12% from last month</p>
            </div>
        </div>

        <!-- Revenue -->
        <div class="card green-gradient">
            <div class="card-header">
                <i class="fa-solid fa-chart-line"></i>
                <span>Revenue</span>
            </div>
            <div class="card-content">
                <h3>$5,000</h3>
                <p><i class="fa-solid fa-arrow-up"></i> 8% from last month</p>
            </div>
        </div>

        <!-- Active Clients -->
        <div class="card purple-gradient">
            <div class="card-header">
                <i class="fa-solid fa-users"></i>
                <span>Active Clients</span>
            </div>
            <div class="card-content">
                <h3>18</h3>
                <p><i class="fa-solid fa-arrow-up"></i> 5% from last month</p>
            </div>
        </div>

        <!-- Pending Orders -->
        <div class="card amber-gradient">
            <div class="card-header">
                <i class="fa-solid fa-exclamation-triangle"></i>
                <span>Pending Orders</span>
            </div>
            <div class="card-content">
                <h3>7</h3>
                <p>Needs attention</p>
            </div>
        </div>
    </div>

    <!-- Additional Sections -->
    <div class="grid-container">
        <div class="card full-width">
            <h3>Monthly Sales</h3>
            <p>Revenue trends for the past 6 months</p>
            <div class="chart-placeholder">[Bar Chart Here]</div>
        </div>

        <div class="card">
            <h3>Recent Activity</h3>
            <p>Latest updates and notifications</p>
            <div class="activity-placeholder">[Activity List Here]</div>
            <button class="btn">View All Activity</button>
        </div>
    </div>

    <div class="grid-container">
        <div class="card">
            <h3>Top Products</h3>
            <p>Best selling seafood items</p>
            <div class="scroll-container">[Product List Here]</div>
        </div>

        <div class="card">
            <h3>Recent Orders</h3>
            <p>Latest 5 orders in the system</p>
            <div class="scroll-container">[Order List Here]</div>
            <button class="btn">View All Orders</button>
        </div>
    </div>


</body>
</html>

      

<?php


?>