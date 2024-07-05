<?php
require 'Admin/dbcon.php'; // Adjust path as per your directory structure

function findLowestInAssocArray($assocArray) {
    $min = null; // Initialize min with null or some default value
    $minKey = null; // Initialize minKey with null or some default value
    
    foreach ($assocArray as $key => $value) {
        if ($min === null || $value < $min) {
            $min = $value; // Update min if a smaller value is found
            $minKey = $key; // Update minKey to current key
        }
    }
    
    return [$minKey, $min]; // Return an array containing both key and value
}


$data = []; // Initialize $data as an array to accumulate database results

$sname = "beauty";
$sql = "SELECT name, tasks FROM serviceboys WHERE service_name = '$sname'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    while ($record = mysqli_fetch_assoc($res)) {
        $data[$record['name']] = $record['tasks']; // Assign tasks to the name key in $data array
    }
}

list($lowestKey, $lowestValue) = findLowestInAssocArray($data,);
echo "The lowest value is: $lowestValue with key: $lowestKey\n"; 
?>
