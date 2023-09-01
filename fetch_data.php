<?php
$conn = new mysqli('localhost', 'root', '', 'wp-ajax');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch existing data from the database
$query = "SELECT * FROM ajaxphp"; 

if (!empty($search)) {
    $query .= " WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
}

$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;


    }
}

$conn->close();

// Encode the data in JSON format
echo json_encode($data);

?>



