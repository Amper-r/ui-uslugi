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
    <title>Подробно</title>
</head>
<body>
    <div class="container">
        <main class="main">
            <?php
                $data = getData($connect, $ftp_data);

                $has_electronic_view = $_GET["has_electronic_view"];
                echo ($has_electronic_view != null ? "<a href='index.php?task=getUslugi&has_electronic_view=".$has_electronic_view."' class='back-btn'></a>" : "<a href='index.php?task=getUslugi' class='back-btn'></a>");

                foreach ($data as $item_data) {
                    echo '
                    <header class="header">
                        <h1 class="title">'.$item_data["name"].': <span class="id">ID: '.$item_data["id"].'</span></h1>
                    </header>
                    <ul class="list-prop">
                        <li class="item-prop">
                            <span class="item-prop-key">Организация:</span>
                            <span class="item-prop-value">'.$item_data["organization"].'</span>
                        </li>
                        <li class="item-prop">
                            <span class="item-prop-key">Оплата:</span>
                            <span class="item-prop-status '.($item_data["payment"] ? "true" : "false").'">'.($item_data["payment"] ? "true" : "false").'</span>
                        </li>
                        <li class="item-prop">
                            <span class="item-prop-key">Оплата гос. пошлины:</span>
                            <span class="item-prop-status '.($item_data["state_duty_payment"] ? "true" : "false").'">'.($item_data["state_duty_payment"] ? "true" : "false").'</span>
                        </li>
                        <li class="item-prop">
                            <span class="item-prop-key">Имеет электронный вид:</span>
                            <span class="item-prop-value">'.$item_data["has_electronic_view"].'</span>
                        </li>
                    </ul>';
                }
            ?>
        </main>
    </div>
</body>
</html>