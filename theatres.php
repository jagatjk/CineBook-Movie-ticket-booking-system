<?php
include 'config/db.php';

if (!isset($_GET['movie_id'])) {
    die("No movie selected");
}
$movie_id = $_GET['movie_id'];
$movie = $conn->query("SELECT * FROM movies WHERE id=$movie_id")->fetch_assoc();
$shows = $conn->query("SELECT * FROM shows WHERE movie_id=$movie_id");

$data = [];
while($row = $shows->fetch_assoc()) {
$data[] = $row;
}


?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="icon" type="image/png" href="Images/icon.png">
    </head>
    <body>
        
        <h1>CINEBOOK</h1>
        <ul class="menu">
            <a href="index.php"><li>Home</li></a>
            <a href="movies.php"><li>Movies</li></a>
            <a href="theatres.php"><li class="active">Theatres</li></a>
            <a href="login.php"><li>Login</li></a>
        </ul>
        <h2 class="movietitle"><?php echo $movie['title']; ?></h2>
        
        
        <div class="date">
            <button class="date-btn" onclick="selectDate(this,'06')">
                <span class="day">06</span>
                <span class="month">April</span>
            </button>
            <button class="date-btn"onclick="selectDate(this,'07')">
                <span class="day">07</span>
                <span class="month">April</span>
            </button>
            <button class="date-btn"onclick="selectDate(this,'08')">
                <span class="day">08</span>
                <span class="month">April</span>
            </button>
            <button class="date-btn"onclick="selectDate(this,'09')">
                <span class="day">09</span>
                <span class="month">April</span>
            </button>
            <button class="date-btn"onclick="selectDate(this,'10')">
                <span class="day">10</span>
                <span class="month">April</span>
            </button>
            <button class="date-btn"onclick="selectDate(this,'11')">
                <span class="day">11</span>
                <span class="month">April</span>
            </button>
        </div>
        
        <br>
        <br>
        <div class="theatre">
            <div class="theatrecard" onclick="selectTheatre(this,'PVR')">
                <div class="left">
                    <img src="Images/pvr.jpg"><h3>PVR</h3>
                </div>
                <div class="right" id="showtimes-pvr"></div>
            </div>
            <hr>
            <div class="theatrecard ino" onclick="selectTheatre(this,'INOX')">
                <div class="left">
                    <img src="Images/inox.jpg"><h3>INOX</h3>
                </div>
                <div class="right" id="showtimes-inox"></div>
            </div>
            <hr>
            <div class="theatrecard" onclick="selectTheatre(this,'CINEPOLIS')">
                <div class="left">
                    <img src="Images/cinepolis.jpg"><h3>CINEPOLIS</h3>
                </div>
                <div class="right" id="showtimes-cinepolis"></div>
            </div>
            <hr>
            <div class="theatrecard cine" onclick="selectTheatre(this,'CINEMA CITY')">
                <div class="left">
                    <img src=Images/cinemacity.jpg><h3>CINEMA CITY</h3>
                </div>
                <div class="right" id="showtimes-cinemacity"></div>
            </div>
        </div>

        <div class="poster poster1"></div>
        <div class="poster poster2"></div>
        <div class="poster poster3"></div>
        <div class="poster poster4"></div>
        <div class="poster poster5"></div>
        <div class="poster poster6"></div>
        <div class="poster poster7"></div>
        <div class="poster poster8"></div>
        <div class="poster poster9"></div>
        <div class="poster poster10"></div>
    </body>
    <script>
        let selectedTheatre = "";
        let showsFromDB = <?php echo json_encode($data); ?>;
        console.log(showsFromDB);
       function showtimes(date) 
       {
            if (!selectedTheatre) {
                alert("Select a theatre first");
                return;
            }

            const container = document.getElementById(
                "showtimes-" + selectedTheatre.toLowerCase()
            );

            container.innerHTML = "";

            const theatreMap = {
                "PVR": 1,
                "INOX": 2,
                "CINEPOLIS": 3,
                "CINEMA CITY":4
            };

            const filteredShows = showsFromDB.filter(show => {
                return show.show_date.split("-")[2] === date &&
                    show.theatre_id == theatreMap[selectedTheatre];
            });

            console.log("Filtered shows:", filteredShows);

            filteredShows.forEach(show => {
                const btn = document.createElement("button");
                btn.classList.add("time-btn");

                btn.innerText = show.show_time.substring(0,5);

                btn.onclick = function () {
                    window.location.href = "booking.php?show_id=" + show.id;
                };

                container.appendChild(btn);
            });
        }

        function selectDate(button, date) {
            console.log("Clicked date:", date);
            document.querySelectorAll(".date-btn").forEach(btn => {
                btn.classList.remove("active");
            });

            button.classList.add("active");
            showtimes(date);
        }
        function selectTheatre(element, theatre) {
            
            selectedTheatre = theatre;

            document.querySelectorAll(".theatrecard").forEach(card => {
                card.classList.remove("selected");
            });

            element.classList.add("selected");

            document.querySelector(".date").style.display = "flex";
        }

    </script>
</html>