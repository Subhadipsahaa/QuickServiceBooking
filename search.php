<?php
// Database connection
require 'Admin/dbcon.php'; // Adjust the path to your database connection file

// Check if the term parameter is set in the GET request
if (isset($_GET['query'])) {
    $term = $_GET['query'];
    
    // Prepare the SQL query to fetch matching services from the database
    $stmt = $conn->prepare("SELECT * FROM services WHERE service_name LIKE ?");
    $searchTerm = "%" . $term . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Start building the list
        echo '<ul class="list-unstyled ulist">';
        while ($row = $result->fetch_assoc()) {
            // Output each service name as a list item
            echo '<li style="color:white;" id="sli" class="sele">' . str_replace("_", " ", $row["service_name"]) . '</li>';
        }
        echo '</ul>'; // Close the list after all items are printed
    } else {
        // No results found
        echo '<ul class="list-unstyled">';
        echo '<li style="color:white;" class="sele">Not Found</li>';
        echo '</ul>';
    }
    
    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
