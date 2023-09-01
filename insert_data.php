<?php
$conn = new mysqli('localhost', 'root', '', 'wp-ajax');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $na = $_POST['name'];
    $ema = $_POST['email'];
    
    $query = "INSERT INTO ajaxphp (name, email) VALUES ('$na', '$ema')";
    
    if ($conn->query($query) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <h1>Insert Data</h1>
    <form id="contact-form" method="post">
        <table>
            <tr>
                <td>Name<input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <td>Email<input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" id="insertData"></td>
            </tr>
        </table>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#contact-form").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                
                $.ajax({
                    type: "POST",
                    url: "insert_data.php", // Replace with the actual URL to your server-side script for inserting data
                    data: formData,
                    success: function(response) {
                        console.log("Data inserted successfully!");
                        
                        // redirection on this path
                        window.location.href = "show-data.php";
                        // Perform any actions you want after successful insertion
                    },
                    error: function(error) {
                        console.log("Error inserting data: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
