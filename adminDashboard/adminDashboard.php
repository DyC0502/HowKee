<?php
include '../_headAdmin.php';

// Define available tabs and their corresponding content files
$tabs = [
    "adminOverview" => "../adminDashboard/adminContent/adminOverview.php",
    "orderManagement" => "../adminDashboard/adminContent/orderManagement.php",
    "clients" => "../adminDashboard/adminContent/clients.php",
    "inventory" => "../adminDashboard/adminContent/inventory.php",
    "settings" => "../adminDashboard/adminContent/settings.php",
];

// Get the selected tab from the URL (default to 'adminOverview' if none is selected)
$selectedTab = $_GET['tab'] ?? 'adminOverview';

// Ensure the selected tab exists; if not, default to 'adminOverview'
$contentFile = $tabs[$selectedTab] ?? $tabs["adminOverview"];
?>

<link rel="stylesheet" href="/adminDashboard/adminDashboard.css">

<main>
    <div class="main-container">
        <div class="navigation">
            <div class="tabs-list">
                <a href="?tab=adminOverview" class="tab <?= $selectedTab == 'adminOverview' ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-bar"></i>
                    <span>Overview</span>
                </a>
                <a href="?tab=orderManagement" class="tab <?= $selectedTab == 'orderManagement' ? 'active' : '' ?>">
                    <i class="fa-solid fa-shopping-bag"></i>
                    <span>Orders</span>
                </a>
                <a href="?tab=clients" class="tab <?= $selectedTab == 'clients' ? 'active' : '' ?>">
                    <i class="fa-solid fa-users"></i>
                    <span>Clients</span>
                </a>
                <a href="?tab=inventory" class="tab <?= $selectedTab == 'inventory' ? 'active' : '' ?>">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Inventory</span>
                </a>
                <a href="?tab=settings" class="tab <?= $selectedTab == 'settings' ? 'active' : '' ?>">
                    <i class="fa-solid fa-cog"></i>
                    <span>Settings</span>
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
