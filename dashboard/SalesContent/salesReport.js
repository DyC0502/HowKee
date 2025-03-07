document.addEventListener("DOMContentLoaded", function () {
    console.log("Report Data:", reportData);

    // Populate charts
    const productNames = reportData.productSales.map(p => p.name);
    const productSales = reportData.productSales.map(p => p.sales);
    const productColors = reportData.productSales.map(p => p.color);

    // Chart: Sales by Product
    new Chart(document.getElementById("salesByProductChart"), {
        type: "bar",
        data: {
            labels: productNames,
            datasets: [{
                label: "Sales",
                data: productSales,
                backgroundColor: productColors
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y',
            scales: {
                x: { beginAtZero: true }
            }
        }
    });

    // Chart: Daily Sales Trend
    new Chart(document.getElementById("dailySalesChart"), {
        type: "line",
        data: {
            labels: reportData.salesByDay.map(d => d.date),
            datasets: [{
                label: "Daily Sales",
                data: reportData.salesByDay.map(d => d.sales),
                borderColor: "#8884d8",
                backgroundColor: "rgba(136, 132, 216, 0.2)",
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
