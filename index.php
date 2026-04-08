<?php
include 'config/db.php';
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <title>CINEBOOK</title>
        <link rel="icon" type="image/png" href="Images/icon.png">
    </head>
    
    <body>
        <h1>CINEBOOK</h1>
        <ul class="menu">
            <a href="index.php"><li class="active">Home</li></a>
            <a href="movies.php"><li>Movies</li></a>
            <a href="theatres.php"><li>Theatres</li></a>
            <a href="login.php"><li>Login</li></a>
        </ul>
        <h2>Recommended Movies</u></h2>
        <div class="row-wrapper">
            <button class="arrow left" id="leftArrow">‹</button>
            <div class="movies" id="movieRow">

            <?php
            $result = $conn->query("SELECT * FROM movies");

            while($row = $result->fetch_assoc()) {
            ?>

                <div class="card">
                    <a href="theatres.php?movie_id=<?php echo $row['id']; ?>">
                        <img src="Images/<?php echo $row['image']; ?>">
                    </a>

                    <h3><?php echo $row['title']; ?></h3>
                    <hr>

                    <a href="theatres.php?movie_id=<?php echo $row['id']; ?>">
                        <button>Book now</button>
                    </a>
                </div>

            <?php } ?>
        </div>
        <button class="arrow right" id="rightArrow">›</button>
            


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
        <script>
            const rows=document.querySelectorAll(".row-wrapper");
            rows.forEach(wrapper=>{
                const row=wrapper.querySelector(".movies");
                const left=wrapper.querySelector(".left");
                const right=wrapper.querySelector(".right");

                right.addEventListener("click",()=>{
                    row.scrollBy({left:500,behavior:"smooth"});
                });
                left.addEventListener("click",()=>{
                    row.scrollBy({ left:-500,behavior:"smooth"});
                });
            });
        </script>
        
    </body>
    <footer>
        <br>
        <br>
        <br>
        <br>
        <div class="logo"><img src ="Images/logo.png"></div>
        <br>
        <br>
        
        <h6>@CINEBOOK | cinebook@gmail.com | 123-456-789</h6>
    </footer>
</html>