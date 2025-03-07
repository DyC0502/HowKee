<?php
include '../_head.php';

$tabs = [
    "newOrder" => "../dashboard/SalesContent/newOrder.php",
    "orderHistory" => "../dashboard/SalesContent/orderHistory.php",
    "salesReport" => "../dashboard/SalesContent/salesReport.php",
];
$selectedTab = $_GET['tab'] ?? 'newOrder';
$contentFile = $tabs[$selectedTab] ?? $tabs["newOrder"];
?>

<link rel="stylesheet" href="/dashboard/dashboard.css">

<main>
    <div class="main-container">
        <div class="navigation">
            <div class="tabs-list">
                <a href="?tab=newOrder" class="tab <?= $selectedTab == 'newOrder' ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-bar"></i>
                    <span>New Order</span>
                </a>
                <a href="?tab=orderHistory" class="tab <?= $selectedTab == 'orderHistory' ? 'active' : '' ?>">
                    <i class="fa-solid fa-shopping-bag"></i>
                    <span>Order History</span>
                </a>
                <a href="?tab=salesReport" class="tab <?= $selectedTab == 'salesReport' ? 'active' : '' ?>">
                    <i class="fa-solid fa-users"></i>
                    <span>Monthly Report</span>
                </a>
            </div>
        </div>

        <!-- Dynamic Content Section -->
        <div id="content-container">
            <?php include $contentFile; ?>
        </div>
    </div>
</main>
<?php

include '../_foot.php';
?>