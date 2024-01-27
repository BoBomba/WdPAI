<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <script src="./public/js/script.js"></script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=____&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    
    <title>Dashboard</title>
</head>

<body class="dashboard">
    <nav>
        <a id="navMenu" onclick="toggleMenu()">|||</a>

        <img id="textlogo" src="src/images/MpkGo_white.svg">
        <img id="logo" src="src/images/MpkGo_Icon_white.svg">
    </nav>

    <div class="navbar" id="myNavbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </div>

    <main>
        <a href="/newIncident">Dodaj Incydent</a>
    </main>

    <footer>
        Damian Guca
    </footer>

</body>

</html>