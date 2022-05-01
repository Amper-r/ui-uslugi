<?php
     require_once __DIR__ ."/phpFunctions/dataConnection.php";

     require_once __DIR__ ."/phpFunctions/databaseConnect.php";
     require_once __DIR__ ."/phpFunctions/xml.php";
     require_once __DIR__ ."/phpFunctions/errors.php";
     require_once __DIR__ ."/phpFunctions/getData.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normilize.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Главная</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="title no_capitalize">Наши услуги</h1>
        </header>
        <main class="main">
            <ul class="list-services">
                <?php
                    $data = getData($connect, $ftp_data);
                    foreach (getData($connect, $ftp_data) as $value) {
                        echo "<li><a class='list-link' href='usluga.php?task=getUsluga&uslugaId=".$value["id"]."&has_electonic_view=".$_GET["has_electonic_view"]."'>".$value["name"]."</a></li>";
                    }
                    $has_electonic_view = $_GET["has_electonic_view"] != null ? "<a href='usluga.php?task=getUslugi&has_electonic_view=".$_GET["has_electonic_view"]."' class='btn-more'>Показать все услуги подробно</a>" : "<a href='usluga.php?task=getUslugi' class='btn-more'>Показать все услуги подробно</a>";

                    echo "<li>".$has_electonic_view."</li>";
                ?>
            </ul>
        </main>
    </div>
</body>
</html>