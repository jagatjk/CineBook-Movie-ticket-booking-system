<?php
include 'config/db.php';

$show_id = $_GET['show_id'];
$seats = explode(",", $_GET['seats']);

$query = "SELECT m.title, m.image 
          FROM shows s 
          JOIN movies m ON s.movie_id = m.id 
          WHERE s.id = $show_id";

$result = $conn->query($query);
$row = $result->fetch_assoc();

$movie = $row['title'];
$poster = $row['image'];
$total = $_GET['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&family=Doto:wght@100..900&display=swap" rel="stylesheet">
    <title>Ticket</title>

    <style>
        body {
            margin: 0;
            font-family: "Doto",sans-serif;
            background-color:black;
        }

        .container {
            position: relative;
            height: 100vh;
        }
        .ticket {
            position: relative;
            width: 300px;
            height: 500px;
            margin: auto;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 15px;
            overflow: hidden;
        }

        .ticket-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('Images/<?php echo $poster; ?>') center/cover no-repeat;
            filter: blur(4px) brightness(0.4);
            z-index: 1;
        }

        .ticket-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            color: white;

            display: flex;
            flex-direction: column;
            height: 100%;
        }
        h1 {
            font-family:"Doto",sans-serif;
            text-align: center;
            color: black;
            text-shadow:
                -1px -1px 0 white,
                1px -1px 0 white,
                -1px  1px 0 white,
                1px  1px 0 white;
            letter-spacing:1px;

        }

       .info {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            font-size:16px;
        }

        .label {
            color: #cbd5f5;
            font-weight: 500;
        }

        .value {
            font-weight: bold;
            color: white;
        }
        .details {
            margin-top: auto;
            padding-bottom:70px;
            text-shadow:
                -1px -1px 0 black,
                1px -1px 0 black,
                -1px  1px 0 black,
                1px  1px 0 black;
        }

        .divider {
            border-top: 1px dashed rgba(255,255,255,0.2);
            margin: 10px 0;
        }
    </style>
</head>

<body>

<div class="container">
   <div class="ticket">
        <div class="ticket-bg"></div> 

        <div class="ticket-content">  
            <h1>BOOKING CONFIRMED</h1>
            <div class="details">

                <div class="info">
                    <span class="label">Movie</span>
                    <span class="value"><?php echo $movie; ?></span>
                </div>

                <div class="info">
                    <span class="label">Show ID</span>
                    <span class="value"><?php echo $show_id; ?></span>
                </div>

                <div class="info">
                    <span class="label">Seats</span>
                    <span class="value"><?php echo implode(", ", $seats); ?></span>
                </div>

                <div class="info">
                    <span class="label">Total Paid</span>
                    <span class="value">$<?php echo $total; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
    

</div>

</body>
</html>