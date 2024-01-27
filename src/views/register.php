<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Register</title>
</head>

<body class="register">

    <div id="powrot" ><a href="/" id="logreg">Powrót</a></div>
        <div class="main-container" style="gap:0;">
        
            <h1>Rejestracja</h1>
            <form action="/register" method="POST">

                <div id="input">
                    <!-- <img src="src/images/user.png">  jakby nie działało svg--> 
                    <img src="src/images/user.svg">
                    <input type="text" id="firstname" name="name" placeholder="Wprowadź Imie">
                </div>

                <div id="input">
                    <img src="src/images/user.svg">
                    <input type="text" id="lastname" name="surname" placeholder="Wprowadź Nazwisko">
                </div>

                <div id="input">
                    <img src="src/images/user.svg">
                    <input type="email" name="email" placeholder="Wprowadź email">
                </div>
                
                <div id="input">
                    <!-- <img src="src/images/lock.png" id="lock"> to samo -->
                    <img src="src/images/lock.svg" id="lock">
                    <input type="password" name="password" placeholder="Wprowadź hasło">
                </div>

                <div id="input">
                    <img src="src/images/lock.svg" id="lock">
                    <input type="password" name="repeated_password" placeholder="Wprowadź ponownie hasło">
                </div>

                <div id="messages"><?php
                        if (isset($messages)){
                            foreach ($messages as $message){
                                echo "".$message."";
                            } 
                        }
                ?></div>

                <button id="logreg" type="submit">Zarejestruj się</button>
                <button id="logreg" type="reset">reset</button>
            </form>
        </div>
</body>

</html>