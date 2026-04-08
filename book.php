<?php
include 'config/db.php';

$show_id = $_POST['show_id'];
$seats = json_decode($_POST['seats'], true);

if (!$show_id || empty($seats)) {
    echo "INVALID DATA";
    exit;
}

foreach ($seats as $seat) {

    $sql = "INSERT INTO bookings (show_id, seat_number) 
            VALUES ($show_id, '$seat')";

    if (!$conn->query($sql)) {
        echo "DB ERROR: " . $conn->error;
        exit;
    }
}

echo "SUCCESS";
?>