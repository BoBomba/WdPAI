<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Dashboard</title>
</head>

<body class="dashboard">

    <a href="/dashboard">
        Powrót
    </a>

    <nav>
        <h1>Logo</h1>
        <ul>
            <li>HOME</li>
            <li>Create</li>
            <li>List</li>
            <li href="/login">Login</li>
        </ul>
    </nav>

    <main>

        <div class="sidebar">

            Sidebar

        </div>

        <div class="elements">

            <h1>Elements<h1>
                <div class="news">

                    <?php foreach($dogs as $dog): ?>

                    <div class="news-container">
                        <img class="news-image" src="https://cdn2.thecatapi.com/images/bnr.jpg" alt="News Image 1">
                        <div class="news-description">
                            <p></p>
                            <p>Short description of the news article goes here. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.</p>
                        </div>
                    </div> 

                    <?php endforeach; ?>

                </div>
                    
        </div>
    </main>

</body>

</html>