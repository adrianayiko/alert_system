<?php
include ("connection.php");

$sql = "SELECT * FROM notifications ORDER BY Date DESC";
$result = $con->query($sql);

$data = array(); // Initialize an empty array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Add each row to the data array
    }
     $new = json_encode($data);
} else {
     json_encode([]);
}

// Get the last check time from the GET parameters
$lastCheck = isset($_GET['lastCheck']) ? $_GET['lastCheck'] : '1970-01-01T00:00:00Z';

// Create your query

$sql = "SELECT * FROM notifications WHERE Date > '$lastCheck' AND status = 0";

// Execute the query
$result = mysqli_query($con, $sql);

// Fetch your records
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Add the ID to each record
foreach ($records as &$record) {
    $record['id'] = $record['id'];
}

// Output records in JSON format
echo json_encode($records);

$con->close(); // Close the database connection
?>
