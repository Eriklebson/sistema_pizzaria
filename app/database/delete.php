<?php
function delete($table, $id){
    try{
        $connect = connect();
        $sql = "delete from {$table}";
        $sql.= " where id = {$id}";
        $prepare = $connect->prepare($sql);
        return $prepare->execute();
    }
    catch(PDOException $e){
        var_dump($e->getMessage());
    }
}
?>