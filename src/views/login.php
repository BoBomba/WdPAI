<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Document</title>
</head>

<body class="login">

    <a href="/dashboard">
        Powrót
    </a>
    <div class="panel_loginu">
        <div class="login">
            <h1>Login</h1>
            <form action="/login" method="POST">
                <input type="email">
                <input type="password">
                <button type="submit">Sign in</button>
                <button type="reset">reset</button>
            </form>
        </div>
    </div>
</body>

</html>