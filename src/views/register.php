<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Document</title>
</head>

<body class="register">

    <div id="powrot" ><a href="/" id="logreg">Powrót</a></div>
        <div class="main-container">
            <!-- TODO  -->
            <h1>Rejestracja</h1>
            <form action="/register" method="POST">
                <div id="input">
                    <img src="src/images/user.png">
                    <input type="text" id="firstname" placeholder="Wprowadź Imie">
                </div>
                <div id="input">
                    <img src="src/images/user.png">
                    <input type="text" id="lastname" placeholder="Wprowadź Nazwisko">
                </div>

                <div id="input">
                    <img src="src/images/user.png">
                    <input type="email" placeholder="Wprowadź email">
                </div>
                
                <div id="input">
                    <img src="src/images/lock.png">
                    <input type="password" placeholder="Wprowadź hasło">
                </div>
                <div id="input">
                    <img src="src/images/lock.png">
                    <input type="password" placeholder="Wprowadź ponownie hasło">
                </div>
                <button id="logreg" type="submit">Zarejestruj się</button>
                <button id="logreg" type="reset">reset</button>
            </form>
        </div>
</body>

</html>