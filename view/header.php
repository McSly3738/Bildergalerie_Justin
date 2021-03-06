<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/validation.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Arimo|Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <title><?= $title ?> | DB</title>
</head>
<body>

<header>
    <div class="logo">
    </div>

    <div class="navigation">
        <ul class="te">
            <?php if(!isset($_SESSION['user_id'])) { ?>
            <li><a href="/">Home</a></li>
            <?php } ?>
            <?php
                if(isset($_SESSION['user_id'])){
                    echo "<li><a href=\"/galerie/index\">Meine Galerie</a></li>";
                    echo "<li><a href=\"/user/update\">Passwort bearbeiten</a></li>";
                    echo "<li><a href=\"/galerie/create\">Galerie hinzufügen</a></li>";
                    echo "<li><a href=\"/user/logout\">Logout</a></li>";
                }
                else{
                    echo "<li><a href=\"/galerie/globalGalerie\">Öffentliche Galerien</a></li>";
                    echo "<li><a href=\"/user/\">Alle User</a></li>";
                    echo "<li><a href=\"/user/login\">Login</a></li>";
                }
                ?>
        </ul>
    </div>
</header>

</body>
</html>
