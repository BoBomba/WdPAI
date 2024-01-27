<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>New Incident</title>
</head>

<body class="incident">

<div id="powrot" ><a href="/dashboard" id="logreg">Powrót</a></div>
    <div class="add_incident">
        <div class="main-container">
            <h1>Nowe Zdarzenie</h1>
            <form action="/addIncident" method="POST" enctype="multipart/form-data">
                <div id="input">
                    <input type="text" name="title" placeholder="Co się stało?">
                </div>
                <div id="input">
                    <input type="text" name="description" rows="2" placeholder="Opisz zdarzenie">
                </div>
                <div id="input">
                    <input type="text" name="location" placeholder="Gdzie się to stało?">
                </div>
                <div id="input">
                    <input type="file" name="file" placeholder="Dodaj Zdjęcie">
                </div>

                <div id="messages"><?php
                        if (isset($messages)){
                            foreach ($messages as $message){
                                echo "".$message."";
                            } 
                        }
                ?></div>

                <button id="logreg" type="submit">Zarejestuj Zdarzenie</button>
                <button id="logreg" type="reset">reset</button>
            </form>
        </div>
    </div>
</body>

</html>