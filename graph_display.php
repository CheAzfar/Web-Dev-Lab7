<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'expenditure_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for domestic visitors
$sql_visitors = "SELECT component, year_2010, year_2011 FROM domestic_visitors";
$result_visitors = $conn->query($sql_visitors);

$components_visitors = [];
$year_2010_visitors = [];
$year_2011_visitors = [];

if ($result_visitors->num_rows > 0) {
    while ($row = $result_visitors->fetch_assoc()) {
        $components_visitors[] = $row['component'];
        $year_2010_visitors[] = $row['year_2010'];
        $year_2011_visitors[] = $row['year_2011'];
    }
}

// Fetch data for domestic tourists
$sql_tourists = "SELECT component, year_2010, year_2011 FROM domestic_tourists";
$result_tourists = $conn->query($sql_tourists);

$components_tourists = [];
$total_tourists_2011 = [];

if ($result_tourists->num_rows > 0) {
    while ($row = $result_tourists->fetch_assoc()) {
        $components_tourists[] = $row['component'];
        $total_tourists_2011[] = $row['year_2011']; // Pie chart uses only 2011 data
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expenditure Graphs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Expenditure by Domestic Visitors and Tourists</h2>

    <button onclick="showGraph('visitors')">Show Domestic Visitors (Bar Graph)</button>
    <button onclick="showGraph('tourists')">Show Domestic Tourists (Pie Chart)</button>

    <canvas id="chart" width="600" height="400"></canvas>

    <script>
        // Data for bar graph (visitors)
        const dataVisitors = {
            labels: <?php echo json_encode($components_visitors); ?>,
            datasets: [
                {
                    label: '2010 (RM million)',
                    data: <?php echo json_encode($year_2010_visitors); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: '2011 (RM million)',
                    data: <?php echo json_encode($year_2011_visitors); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        };

        // Data for pie chart (tourists)
        const dataTourists = {
            labels: <?php echo json_encode($components_tourists); ?>,
            datasets: [
                {
                    label: '2011 (RM million)',
                    data: <?php echo json_encode($total_tourists_2011); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        };

        // Initialize Chart.js
        const ctx = document.getElementById('chart').getContext('2d');
        let chart; // Chart instance

        // Function to toggle between graphs
        function showGraph(type) {
            if (chart) {
                chart.destroy(); // Destroy existing chart before creating a new one
            }

            if (type === 'visitors') {
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: dataVisitors,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else if (type === 'tourists') {
                chart = new Chart(ctx, {
                    type: 'pie',
                    data: dataTourists,
                    options: {
                        responsive: true
                    }
                });
            }
        }

        // Show bar graph (visitors) by default
        showGraph('visitors');
    </script>
</body>
</html>
