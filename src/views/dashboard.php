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

    <?php if (isset($_SESSION['incident_added']) && $_SESSION['incident_added']): ?>
        <script>
            window.onload = function() {
                alert('Pomyślnie dodano zdarzenie');
            };
        </script>
        <?php unset($_SESSION['incident_added']); // Usuń flagę z sesji ?>
    <?php endif; ?>



    <nav>
        <a id="navMenu" onclick="toggleMenu()">|||</a>

        <img id="textlogo" src="src/images/MpkGo_white.svg">
        <img id="logo" src="src/images/MpkGo_Icon_white.svg">
    </nav>

    <div class="navbar" id="myNavbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="/newIncident">Dodaj Incydent</a>
        <a href="#">Contact</a>
    </div>

    <main>
        
    </main>

    <footer>
        Damian Guca
    </footer>

</body>

</html>