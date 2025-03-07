<?php
include '../_head.php';
?>
<main>

<link rel="stylesheet" href="/dashboard/dashboard.css">

<main>
<div class="main-container">
<div class="navigation">
      <div class="tabs-list">
        <button class="tab" data-tab="newOrder">
          <i class="fa-solid fa-chart-bar"></i>
          <span>New Order</span>
        </button>
        <button class="tab" data-tab="orderHistory">
          <i class="fa-solid fa-shopping-bag"></i>
          <span>Order History</span>
        </button>
        <button class="tab" data-tab="salesReport">
          <i class="fa-solid fa-users"></i>
          <span>Monthly fdsReport</span>
        </button>
      </div>
      </div>
      <!-- Dynamic Content Section -->
    <div id="content-container">
    <?php include '../dashboard/SalesContent/newOrder.php'; ?>  <!-- Default Content -->
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
    const defaultTab = document.querySelector('.tab[data-tab="newOrder"]');
    if (defaultTab) {
        setActiveTab(defaultTab);
        loadContent("../dashboard/SalesContent/newOrder.php");
    }

    // Event listener for tabs
    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            const page = "../dashboard/salesContent/" + this.getAttribute("data-tab") + ".php";
            setActiveTab(this);
            loadContent(page);
        });
    });
});

</script>

</main>

<?php

include '../_foot.php';
?>