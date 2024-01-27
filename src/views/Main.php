<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>MpkGo</title>
</head>

<body class="main">

    <?php if (isset($_SESSION['logout']) && $_SESSION['logout']): ?>
        <script>
            window.onload = function () {
                alert('Pomyślnie Wylogowano');
            };
        </script>
        <?php unset($_SESSION['logout']);  ?>
    <?php endif; ?>


    <div class="main-container">
        <img src="src/images/MpkGo.svg">
        <img src="src/images/MpkGo_Icon.svg">
        <a id="logreg" href="/login">Zaloguj się</a>
        <a id="logreg" href="/register">Zarejestruj się</a>
    </div>

</body>

</html>