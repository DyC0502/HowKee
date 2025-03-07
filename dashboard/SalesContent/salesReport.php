<?php
// Mock data (in a real scenario, fetch data from a database)
$reportData = [
    "totalSales" => 12500.75,
    "totalOrders" => 83,
    "totalCommission" => 1250.00,
    "productSales" => [
        ["name" => "Product A", "quantity" => 50, "sales" => 5000.00, "color" => "#FF6384"],
        ["name" => "Product B", "quantity" => 30, "sales" => 3000.00, "color" => "#36A2EB"],
        ["name" => "Product C", "quantity" => 20, "sales" => 2000.00, "color" => "#FFCE56"]
    ],
    "salesByDay" => [
        ["date" => "2025-03-01", "sales" => 500],
        ["date" => "2025-03-02", "sales" => 700],
        ["date" => "2025-03-03", "sales" => 600],
        ["date" => "2025-03-04", "sales" => 900]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report Dashboard</title>
    <link rel="stylesheet" href="/dashboard/SalesContent/salesReport.css">
    <script>
        const reportData = <?= json_encode($reportData); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/dashboard/SalesContent/salesReport.js" defer></script>
</head>
<body>

<div class="sales-card animate-fade-in">
    <div class="sales-card-header">
        <div>
            <h2 class="sales-card-title">Monthly Sales Report</h2>
            <p class="sales-card-description"><?= date("F Y") ?></p>
        </div>
        <button class="sales-btn" id="download-btn">
            <span class="icon">⬇</span> Download Report
        </button>
    </div>

    <div class="sales-card-content">
        <div class="sales-grid">
            <div class="sales-metric-card">
                <div class="sales-metric-content">
                    <p class="text-muted">Total Sales</p>
                    <h3 class="text-bold">$<?= number_format($reportData["totalSales"], 2) ?></h3>
                </div>
            </div>
            <div class="sales-metric-card">
                <div class="sales-metric-content">
                    <p class="text-muted">Average Order</p>
                    <h3 class="text-bold">$<?= number_format($reportData["totalSales"] / $reportData["totalOrders"], 2) ?></h3>
                </div>
            </div>
            <div class="sales-metric-card">
                <div class="sales-metric-content">
                    <p class="text-muted">Your Commission</p>
                    <h3 class="text-bold">$<?= number_format($reportData["totalCommission"], 2) ?></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Sales by Product</h2>
            <div class="chart-container">
                <canvas id="salesByProductChart"></canvas>
            </div>

            <hr>

            <h2>Daily Sales Trend</h2>
            <div class="chart-container">
                <canvas id="dailySalesChart"></canvas>
            </div>

            <hr>

            <h2>Product Sales Details</h2>
            <div class="table-container">
                <table id="salesTable">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Sales Amount</th>
                            <th>% of Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reportData["productSales"] as $product): ?>
                            <tr>
                                <td><?= $product["name"] ?></td>
                                <td><?= $product["quantity"] ?></td>
                                <td>$<?= number_format($product["sales"], 2) ?></td>
                                <td><?= number_format(($product["sales"] / $reportData["totalSales"]) * 100, 1) ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td><?= array_sum(array_column($reportData["productSales"], "quantity")) ?></td>
                            <td>$<?= number_format($reportData["totalSales"], 2) ?></td>
                            <td>100%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
