<?php
require_once("connection.php");

// Fetch events ordered by date
$sql = "SELECT luogo, data, posti_totali, posti_disponibili, posti_occupati FROM evento ORDER BY data ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Event Timeline</h2>";
    echo "<table border='1'><tr><th>Date</th><th>Location</th><th>Total Seats</th><th>Available Seats</th><th>Occupied Seats</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["data"] . "</td><td>" . $row["luogo"] . "</td><td>" . $row["posti_totali"] . "</td><td>" . $row["posti_disponibili"] . "</td><td>" . $row["posti_occupati"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No events found.";
}

$conn->close();
?>