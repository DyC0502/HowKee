<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Tabs</title>
  <link rel="stylesheet" href="/css/appAdmin.css">
  <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
</head>
<body>

  <main class="container">
    <div class="tabs">
      <div class="tabs-list">
        <button class="tab" data-tab="overview">
          <i class="fa-solid fa-chart-bar"></i>
          <span>Overview</span>
        </button>
        <button class="tab" data-tab="orders">
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

      <div class="tab-content">
        <div id="overview" class="tab-panel active">Overview Content</div>
        <div id="orders" class="tab-panel">Orders Content</div>
        <div id="clients" class="tab-panel">Clients Content</div>
        <div id="inventory" class="tab-panel">Inventory Content</div>
        <div id="settings" class="tab-panel">Settings Content</div>
      </div>
    </div>
  </main>

  <script>
    document.querySelectorAll('.tab').forEach(tab => {
      tab.addEventListener('click', function() {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

        this.classList.add('active');
        document.getElementById(this.dataset.tab).classList.add('active');
      });
    });
  </script>

</body>
</html>
