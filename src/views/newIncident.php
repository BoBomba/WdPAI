<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Document</title>
</head>

<body class="incident">

    <a href="/dashboard">
        Powrót
    </a>
    <div class="add_incident">
        <div class="login">
            <!-- TODO  -->
            <h1>Nowe Zdarzenie</h1>
            <form action="/add" method="POST">
                <input type="text" id="what_happened">
                <input type="text" id="description">
                <input type="where">
                <input type="when">
                <button type="submit">Zarejestuj Zdarzenie</button>
                <button type="reset">reset</button>
            </form>
        </div>
    </div>
</body>

</html>