<?php
    $id_ins = $_POST["id_ins"];
    $media_type = $_POST["media_type"];
    $image = $_POST["image"];
    $link_ins = $_POST["link_ins"];
    $time = $_POST["time"];
    $username_post = $_POST["username"];
    $base64_img = $_POST["base64"];

    $base64_img = str_replace('data:image/png;base64,', '', $base64_img);
    
    $base64_img = str_replace(' ', '+', $base64_img);

    $data = base64_decode($base64_img);
        
    $file = UPLOAD_DIR . $id_ins .'.png';

    $success = file_put_contents($file, $data);
    print $success ? $file : 'Unable to save the file.';
        
    $servername = "localhost";
    $username = "lacomuni_oaguser";
    $password = "A}t4{B70E3&w";
    $dbname = "lacomuni_oag";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Instagram (id, id_ins, media_type, image, link_ins, time, username)
    VALUES ('', '$id_ins', '$media_type', '$file', '$link_ins', '$time', '$username_post')";

    if ($conn->query($sql) === TRUE) {
        echo "Enviado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


    
?>
