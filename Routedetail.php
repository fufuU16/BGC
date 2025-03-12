<?php
include 'db_connection.php'; // Include the database connection

// Query to fetch bus stop details
$busStopQuery = "
    SELECT bus_no, passenger_count, eta, bus_number, route, current_stop, next_stop, end_point, timestamp
    FROM bus_stop_details
    WHERE route = 'Central Route'
    ORDER BY bus_no
";

$busStopResult = $conn->query($busStopQuery);

// Check for query errors
if (!$busStopResult) {
    die("SQL error: " . $conn->error);
}

// Fetch data into an array
$busStopData = [];
if ($busStopResult->num_rows > 0) {
    while ($row = $busStopResult->fetch_assoc()) {
        $busStopData[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Details - BGC Landing Page</title>
    <link rel="stylesheet" href="Routedetail.css">
</head>
<body>
<header>
    <nav>
        <button id="navToggle" class="nav-toggle">☰</button>
        <div id="navMenu" class="nav-menu">
            <a href="index.php">Home</a>
            <a href="Routes.php">Routes</a>
            <a href="AboutUs.php" class="active">About Us</a>
            <a href="ContactUs.php">Contact Us</a>
        </div>
    </nav>
</header>
    
    <main>
        <h1 id="route-title">CENTRAL ROUTE</h1>
        <div class="route-image">
            <img src="../image/CENTRAL ROUTE.jpg" alt="Route Image">
        </div>
        
        <section class="bus-stop-details">
            <?php if (!empty($busStopData)): ?>
                <?php foreach ($busStopData as $bus): ?>
                    <div class="bus-stop-card">
                        <h2>Bus No. <?php echo htmlspecialchars($bus['bus_no']); ?></h2>
                        <p><strong>Passenger Count:</strong> <?php echo htmlspecialchars($bus['passenger_count']); ?></p>
                        <p><strong>ETA:</strong> <?php echo htmlspecialchars($bus['eta']); ?></p>
                        <p><strong>Bus Number:</strong> <?php echo htmlspecialchars($bus['bus_number']); ?></p>
                        <p><strong>Current Stop:</strong> <?php echo htmlspecialchars($bus['current_stop']); ?></p>
                        <p><strong>Next Stop:</strong> <?php echo htmlspecialchars($bus['next_stop']); ?></p>
                        <p><strong>End Point:</strong> <?php echo htmlspecialchars($bus['end_point']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No bus stop details available for the Central Route.</p>
            <?php endif; ?>
        </section>
    </main>
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('button.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');

    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('open');
    });

    // Ensure nav-menu is visible in full screen
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navMenu.classList.remove('open');
            navMenu.style.display = 'flex'; // Ensure it's visible in full screen
        } else {
            navMenu.style.display = ''; // Reset to default for mobile
        }
    });
});
</script>

</body>
</html>