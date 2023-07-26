<?php
include ("connection.php");

$sql = "SELECT * FROM notifications";
$result = $con->query($sql);

$data = array(); // Initialize an empty array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Add each row to the data array
    }
} else {
    echo "No data found.";
}
// Get the current timestamp (Unix timestamp)
$currentTimestamp = time();

// Format the timestamp as a human-readable date and time (in the default timezone)
$dateTime = date('Y-m-d H:i:s', $currentTimestamp);

// echo "Current timestamp: " . $currentTimestamp . "<br>";
echo "Current date and time: " . $dateTime;
 
// Retrieve the last known timestamp (you'll need to store this somewhere, like in a session or a file)
$lastKnownTime = $dateTime ; // Replace this with the actual value

// // Query to check for new entries
// $new = "SELECT COUNT(*) AS new_entries FROM entries WHERE last_modified_time > '$lastKnownTime'";
// $res = mysqli_query($con, $sql);
// $row = mysqli_fetch_assoc($result);
// $newEntries = $row['new_entries'];
// echo $row;
// // Return the number of new entries
// echo $newEntries;



$con->close(); // Close the database connection
?>
