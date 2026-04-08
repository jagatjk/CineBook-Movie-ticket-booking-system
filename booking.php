<?php
include 'config/db.php';

$show_id = $_GET['show_id'];

$bookings = $conn->query("SELECT seat_number FROM bookings WHERE show_id=$show_id");

$bookedSeats = [];

while($row = $bookings->fetch_assoc()) {
    $bookedSeats[] = $row['seat_number'];
}
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="icon.png">
        
        <title>CINEBOOK | Booking </title>
    </head>
    <body>
        <a href="theatres.php" class="back-link">
            <svg class="back-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.git 5 0 0 0 0 .708l4 4a.5.5 0 1 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
        </a>
        <h1>Select Seats</h1>
        <div class="layout">
            <div class="seats">
                <p class="Rate">Platinum|$20</p>
                <div class="row-layout">
                    <div class="column">
                        <p>A</p>
                        <p>B</p>
                        <p>C</p>
                        <p>D</p>
                    </div>
            
                    <div class="seat-containerp">
                        <div class="seat seatp">A1</div>
                        <div class="seat seatp">A2</div>
                        <div class="seat seatp">A3</div>
                        <div class="seat seatp">A4</div>
                        <div class="seat seatp">A5</div>
                        <div class="seat seatp">A6</div>
                        <div class="seat seatp">A7</div>
                        <div class="seat seatp">A8</div>
                        <div class="seat seatp">A9</div>
                        <div class="seat seatp">A10</div>
                        
                        <div class="seat seatp">B1</div>
                        <div class="seat seatp">B2</div>
                        <div class="seat seatp">B3</div>
                        <div class="seat seatp">B4</div>
                        <div class="seat seatp">B5</div>
                        <div class="seat seatp">B6</div>
                        <div class="seat seatp">B7</div>
                        <div class="seat seatp">B8</div>
                        <div class="seat seatp">B9</div>
                        <div class="seat seatp">B10</div>

                        <div class="seat seatp">C1</div>
                        <div class="seat seatp">C2</div>
                        <div class="seat seatp">C3</div>
                        <div class="seat seatp">C4</div>
                        <div class="seat seatp">C5</div>
                        <div class="seat seatp">C6</div>
                        <div class="seat seatp">C7</div>
                        <div class="seat seatp">C8</div>
                        <div class="seat seatp">C9</div>
                        <div class="seat seatp">C10</div>

                        <div class="seat seatp">D1</div>
                        <div class="seat seatp">D2</div>
                        <div class="seat seatp">D3</div>
                        <div class="seat seatp">D4</div>
                        <div class="seat seatp">D5</div>
                        <div class="seat seatp">D6</div>
                        <div class="seat seatp">D7</div>
                        <div class="seat seatp">D8</div>
                        <div class="seat seatp">D9</div>
                        <div class="seat seatp">D10</div>
                    </div>
                </div>
            </div>
            <div class="seats">    
                <p class="Rate">Gold|$15</p>
                <div class="row-layout">
                    <div class="column">
                        <p>E</p>
                        <p>F</p>
                        <p>G</p>
                        <p>H</p>
                        <p>I</p>
                        <p>J</p>

                    </div>
                    <div class="seat-containerg">
                        <div class="seat seatg">E1</div>
                        <div class="seat seatg">E2</div>
                        <div class="seat seatg">E3</div>
                        <div class="seat seatg">E4</div>
                        <div class="seat seatg">E5</div>
                        <div class="seat seatg">E6</div>
                        <div class="seat seatg">E7</div>
                        <div class="seat seatg">E8</div>
                        <div class="seat seatg">E9</div>
                        <div class="seat seatg">E10</div>
                        <div class="seat seatg">F1</div>
                        <div class="seat seatg">F2</div>
                        <div class="seat seatg">F3</div>
                        <div class="seat seatg">F4</div>
                        <div class="seat seatg">F5</div>
                        <div class="seat seatg">F6</div>
                        <div class="seat seatg">F7</div>
                        <div class="seat seatg">F8</div>
                        <div class="seat seatg">F9</div>
                        <div class="seat seatg">F10</div>
                        <div class="seat seatg">G1</div>
                        <div class="seat seatg">G2</div>
                        <div class="seat seatg">G3</div>
                        <div class="seat seatg">G4</div>
                        <div class="seat seatg">G5</div>
                        <div class="seat seatg">G6</div>
                        <div class="seat seatg">G7</div>
                        <div class="seat seatg">G8</div>
                        <div class="seat seatg">G9</div>
                        <div class="seat seatg">G10</div>
                        <div class="seat seatg">H1</div>
                        <div class="seat seatg">H2</div>
                        <div class="seat seatg">H3</div>
                        <div class="seat seatg">H4</div>
                        <div class="seat seatg">H5</div>
                        <div class="seat seatg">H6</div>
                        <div class="seat seatg">H7</div>
                        <div class="seat seatg">H8</div>
                        <div class="seat seatg">H9</div>
                        <div class="seat seatg">H10</div>
                        <div class="seat seatg">I1</div>
                        <div class="seat seatg">I2</div>
                        <div class="seat seatg">I3</div>
                        <div class="seat seatg">I4</div>
                        <div class="seat seatg">I5</div>
                        <div class="seat seatg">I6</div>
                        <div class="seat seatg">I7</div>
                        <div class="seat seatg">I8</div>
                        <div class="seat seatg">I9</div>
                        <div class="seat seatg">I10</div>
                        <div class="seat seatg">J1</div>
                        <div class="seat seatg">J2</div>
                        <div class="seat seatg">J3</div>
                        <div class="seat seatg">J4</div>
                        <div class="seat seatg">J5</div>
                        <div class="seat seatg">J6</div>
                        <div class="seat seatg">J7</div>
                        <div class="seat seatg">J8</div>
                        <div class="seat seatg">J9</div>
                        <div class="seat seatg">J10</div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="bookSeats()" class="seatbooking"
        >Book Now</button>
        
        <div class="screen">SCREEN</div>


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
        let bookedSeats = <?php echo json_encode($bookedSeats); ?>;

        let selectedSeats = [];

        document.querySelectorAll(".seat").forEach(seat => {

            seat.addEventListener("click", () => {

                if (seat.classList.contains("booked")) return;

                seat.classList.toggle("selected");

                let seatNo = seat.innerText;

                if (selectedSeats.includes(seatNo)) {
                    selectedSeats = selectedSeats.filter(s => s !== seatNo);
                } else {
                    selectedSeats.push(seatNo);
                }

                console.log(selectedSeats);
            });

        });
        function bookSeats() {

            if (selectedSeats.length === 0) {
                alert("Select at least one seat");
                return;
            }

            fetch("book.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `show_id=<?php echo $show_id; ?>&seats=${JSON.stringify(selectedSeats)}`
            })
            .then(res => res.text())
            .then(data => {
            if (data === "SUCCESS") {
                window.location.href =
                "ticket.php?show_id=<?php echo $show_id; ?>" +
                "&seats=" + selectedSeats.join(",") +
                "&total=" + calculateTotal();
            }
            else {
                    alert(data);
            }
        });
        }
        document.querySelectorAll(".seat").forEach(seat => {
            if (bookedSeats.includes(seat.innerText)) {
                seat.classList.add("booked");
            }
        });
       function calculateTotal() {
            let total = 0;

            selectedSeats.forEach(seat => {
                const row = seat.charAt(0);

                if (["A","B","C","D"].includes(row)) {
                    total += 20; 
                } else {
                    total += 15; 
                }
            });

            return total;
        }
    </script>
</html>