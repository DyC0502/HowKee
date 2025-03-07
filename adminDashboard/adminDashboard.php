<?php
include '../_headAdmin.php';

?>
<link rel="stylesheet" href="/adminDashboard/adminDashboard.css">

<main>
<div class="main-container">
<div class="navigation">
      <div class="tabs-list">
        <button class="tab" data-tab="adminOverview">
          <i class="fa-solid fa-chart-bar"></i>
          <span>Overview</span>
        </button>
        <button class="tab" data-tab="orderManagement">
          <i class="fa-solid fa-shopping-bag"></i>
          <span>Orders</span>
        </button>
        <button class="tab" data-tab="clients">
          <i class="fa-solid fa-users"></i>
          <span>Clients</span>
        </button>
        <button class="tab" data-tab="inventory">
          <i class="fa-solid fa-layer-group"></i>
          <span>Inventory</span>
        </button>
        <button class="tab" data-tab="settings">
          <i class="fa-solid fa-cog"></i>
          <span>Settings</span>
        </button>
      </div>
      </div>
      <!-- Dynamic Content Section -->
    <div id="content-container">
      <?php include '../adminDashboard/adminContent/adminOverview.php'; ?>  <!-- Default Content -->
    </div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab");
    const contentContainer = document.getElementById("content-container");

    // Function to load content dynamically
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                contentContainer.innerHTML = data;
            })
            .catch(error => console.error("Error loading page:", error));
    }

    // Function to set active tab
    function setActiveTab(selectedTab) {
        tabs.forEach(tab => tab.classList.remove("active")); // Remove active from all tabs
        selectedTab.classList.add("active"); // Add active to the selected tab
    }

    // Set default active tab and load content
    const defaultTab = document.querySelector('.tab[data-tab="adminOverview"]');
    if (defaultTab) {
        setActiveTab(defaultTab);
        loadContent("../adminDashboard/adminContent/adminOverview.php");
    }

    // Event listener for tabs
    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            const page = "../adminDashboard/adminContent/" + this.getAttribute("data-tab") + ".php";
            setActiveTab(this);
            loadContent(page);
        });
    });
});

</script>

<?php
include '../_foot.php';

?>