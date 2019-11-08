<?php
    
    $servername = "localhost";
    $username = "lacomuni_oaguser";
    $password = "A}t4{B70E3&w";
    $dbname = "lacomuni_oag";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn === false) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Instagram LIMIT 8";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $array1= array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array1, $row);
        }
        echo json_encode($array1);
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
?>
