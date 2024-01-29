<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">

    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans"
            rel="stylesheet"
    />

    <script src="./public/js/script.js"></script>

    <link rel="stylesheet" href="./public/css/map.css">

        <!--Mapy-->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.css' rel='stylesheet' />
    <script type="module" src="./public/js/mapTokens.js"></script>
    <script type="module" src="./public/js/maps.js"></script>

    <title>Dashboard</title>
</head>

<body class="dashboard">

    <?php if (isset($_SESSION['incident_added']) && $_SESSION['incident_added']): ?>
        <script>
            window.onload = function() {
                alert('Pomyślnie dodano zdarzenie');
            };
        </script>
        <?php unset($_SESSION['incident_added']); ?>
    <?php endif; ?>



    <nav>
        <a id="navMenu" onclick="toggleMenu()">|||</a>

        <img id="textlogo" src="src/images/MpkGo_white.svg">
        <img id="logo" src="src/images/MpkGo_Icon_white.svg">
    </nav>

    <div class="navbar" id="myNavbar">
        <p>
        <?php
            if($_SESSION){
                echo($_SESSION['name']." ".$_SESSION['surname']);
            }
            else{
                echo("Niezalogowany");
            }
        //var_dump($_SESSION);
        ?>
        </p>
        <a href="/dashboard">Home</a>

        <a href="/newIncident">Dodaj Incydent</a>
        <a href="/logout">Wyloguj</a>
    </div>

    <main>
            <div id='map'></div>


    </main>

    <footer>
        Damian Guca
    </footer>

</body>

</html>