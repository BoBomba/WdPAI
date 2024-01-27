<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Document</title>
</head>

<body class="login">
    <div id="powrot" ><a href="/" id="logreg">Powrót</a></div>
        <div class="main-container">
            <h1>Login</h1>
            <form action="/login" method="POST">
                <div id="input">
                    <!-- <img src="src/images/user.png"> jakby nie dzialało svg-->
                    <img src="src/images/user.svg">
                    <input type="email" name="email" placeholder="Wprowadź email">
                </div>
                <div id="input">
                    <!-- <img src="src/images/lock.png" id="lock"> to samo -->
                    <img src="src/images/lock.svg" id="lock">
                    <input type="password" name="password" placeholder="Wprowadź hasło">
                </div>

                <div id="messages"><?php
                        if (isset($messages)){
                            foreach ($messages as $message){
                                echo "".$message."";
                            } 
                        }
                ?></div>

                <button id="logreg" type="submit">Zaloguj się</button>
                <button id="logreg" type="reset">reset</button>
            </form>
            <a  id="forgot" href="/forgotpasswd">Zapomniałeś hasła?</a>
        </div>
        <div id="regbutton">
            <a id="logreg" href="/register">Zarejestruj się</a>
        </div>               
</body>

</html>