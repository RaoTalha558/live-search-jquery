<!DOCTYPE html>
<html>
<head>
    <title>Fetch and Insert Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#loadDataButton").click(function() {
            loadData();
        });

        $("#searchInput").on("input", function() {
            var searchQuery = $(this).val();
            loadData(searchQuery);
        });

       
            });
     

        function loadData(search = "") {
            $.ajax({
                type: "GET",
                url: "fetch_data.php", // Replace with the actual URL to your server-side script for fetching data
                data: { search: search },
                dataType: "json",
                success: function(response) {
                    var output = "";

                    if (response.length > 0) {
                        output += "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";

                        // Iterate through the fetched data
                        for (var i = 0; i < response.length; i++) {
                            if (typeof response[i] !== 'Undefined'  ) {
                                output += "<tr><td>" + response[i].id + "</td><td>" + response[i].name + "</td><td>" + response[i].email + "</td></tr>";  
                            }
                           
                        }

                        output += "</table>";
                    } else {
                        output = "No data available.";
                    }

                    // Display the fetched data on the page
                    $("#dataContainer").html(output);
                },  
                error: function(error) {
                    console.log("Error fetching data: " + error);
                }
            });
        }

    </script>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    </style>
</head>
<body>
    <h1>Fetched Data</h1>
    <input type="text" id="searchInput" placeholder="Enter Search ">
    <button id="loadDataButton">Load Data</button>
    <a href="insert_data.php"><button id="insertData">Insert Data</button></a>
    <div id="dataContainer"></div>



    <?php
    //________________filter validate integer and ip address
// $ip = "127.0.0.100";
// $dd = 1.001251564;
// if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
//   echo("$ip is a valid IP address")."<br>";
// } else {
//   echo("$ip is not a valid IP address")."<br>";
// }
?> 
<?php
// $int = "avsda";
// if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
//   echo("Integer is valid") ." ".$int;
// } else {
//   echo("Integer is not valid")." ".$int."<br>";
// }
?>
<?php

// echo "Created date is " . date("Y-m-d h:i:sa",);
//________________Time  converting tomorrow, today next upcomming months etc....
// $d=strtotime("tomorrow");
// echo date("Y-m-d h:i:sa", $d) . "<br>";

// $d=strtotime("next Saturday");
// echo date("Y-m-d h:i:sa", $d) . "<br>";

// $d=strtotime("+3 Months");
// echo date("Y-m-d h:i:sa", $d) . "<br>";

$d1=strtotime("October 08");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." ";

echo readfile('E:/talha/hajj/New Text Document.txt');

//exist file in some assign assosiate values
// $myfile = fopen("E:/talha/hajj/New Text Document.txt", "w") or die("Unable to open file!");
// $txt = "Mickey Mouse\n";
// fwrite($myfile, $txt);
// $txt = "Minnie Mouse\n";
// fwrite($myfile, $txt);
// fclose($myfile);


?>
</body>
</html>
