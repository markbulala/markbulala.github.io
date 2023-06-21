

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>The Disappearing Snowman</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />  
</head>
<body>
 
    <!-- Game content goes here -->
    <main>
            <section id="snowman-container">
                <img class="hat" src="images/hat.png"/>
                <img class="face nose" src="images/nose.png" />
                <img class="face eyes" src="images/eyes.png" />
                <img class="face mouth" src="images/mouth.png" />
                <img class="scarf" src="images/scarf.png" />
                <img class="hands left-hand" src="images/left-hand.png" />
                <img class="hands right-hand" src="images/right-hand.png" />
                <img class="body-top" src="images/body-top.png" />
                <img class="body-middle" src="images/body-middle.png" />
                <img class="body-bottom" src="images/body-bottom.png" />
            </section>

<br><br><br><br><br><br><br>

            <div id="hint"></div>

 
            <section id="empty-letter-container"></section>
            <section id="keyboard-container">
                <span class="letter">A</span>
                <span class="letter">B</span>
                <span class="letter">C</span>
                <span class="letter">D</span>
                <span class="letter">E</span>
                <span class="letter">F</span>
                <span class="letter">G</span>
                <span class="letter">H</span>
                <span class="letter">I</span>
                <span class="letter">J</span>
                <span class="letter">K</span>
                <span class="letter">L</span>
                <span class="letter">M</span>
                <span class="letter">N</span>
                <span class="letter">O</span>
                <span class="letter">P</span>
                <span class="letter">Q</span>
                <span class="letter">R</span>
                <span class="letter">S</span>
                <span class="letter">T</span>
                <span class="letter">U</span>
                <span class="letter">V</span>
                <span class="letter">W</span>
                <span class="letter">X</span>
                <span class="letter">Y</span>
                <span class="letter">Z</span>
            </section>


        </main>
        <div id="button-container">
        <!-- Play Again button -->
        <form method="POST" action="play.php">
            <input type="submit" name="again" value="Play Again" class="styled-button">
        </form>

        <br>
        <!-- High Score button -->
        <a href="highscore.html">
            <button class="styled-button">High Score</button>
        </a>

        <!-- Logout button -->
        <a href="logout.php">
        <button class="styled-button">Log Out</button>
        </a>
    </div>

    <script src="error-handler.js"></script>
    <script src="app.js"></script>
  


</body>
</html>
