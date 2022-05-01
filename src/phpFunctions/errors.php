<?php
    function AddError($connect, $error, $errorDesc = null){
        $date = date('Y-m-d H:i:s');
        $query =  $connect->query("INSERT INTO `errors` (`id`, `status`, `date_time`, `error`, `error_desc`) VALUES (NULL, 'error', '".$date."', '".$error."', '".$errorDesc."');");
        echo $errorDesc."<br>";
        die("<span style=font-size:16px;><b>Error:</b> ".$error."</span>");
    }
?>