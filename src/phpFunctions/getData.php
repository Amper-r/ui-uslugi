<?php 
    function getData($connect, $ftp_data){
        $fun = $_GET["task"];
        $ids = $_GET["uslugaId"];
        $has_electonic_view = $_GET["has_electonic_view"];
        try {
            if(isset($fun)){
                $data = $fun($connect, $ids, $has_electonic_view);
                if(!isset($data)){
                    AddError($connect, "Function not defined in url parameters");
                }
                UpdateXML($connect, $data, "./result.xml", $ftp_data["ftp_server"], $ftp_data["ftp_user_name"], $ftp_data["ftp_user_pass"]);
                return $data;
            }
        } catch (\Throwable $th) {
            AddError($connect, "Function ".$fun." not found", $th);
        }
     }

 
 
     function getUslugi($connect, $id, $has_electonic_view){
         if(!isset($has_electonic_view)){
             $has_electonic_view = 1;
         }
         $has_electonic_view_str =  $has_electonic_view < 0 ? "" : "WHERE has_electonic_view=".$has_electonic_view;
 
         $query = $connect->query("SELECT * FROM products ".$has_electonic_view_str."");
         while($row = $query->fetch_assoc()){
             $data[] = $row;
         }
 
         if(!$data){
             AddError($connect, "No data found with the specified parameters");
         }
         return $data;
     }
 
     function getUsluga($connect, $ids, $has_electonic_view){
         if(!isset($ids)){
             AddError($connect, "Missing uslugaId argument");
         }
         if(!is_array($ids)){
             $ids = array($ids);
         }
 
         $data = array();
         foreach ($ids as $id) {
             if($id > 0){
                 $query = $connect->query("SELECT * FROM products WHERE id=".$id."");
                 $item = $query->fetch_assoc();
                 if($item){
                     $data[] = $item;
                 }
                 else{
                     AddError($connect, "Record with ID=".$id."");
                 }
             }
             else{
                 AddError($connect, "The ID parameter is undefined or less than or equal to 0");
             }
         }
         if($data){
             return $data;
         }
     }
?>