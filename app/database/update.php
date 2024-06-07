<?php
function update($table, $data, $id){
    try{
        $connect = connect();
        $sql = "update {$table} set ";
        foreach($data as $key=>$field){
            $sql.= $key."=:".$key;
            if(array_key_last($data) != $key){
                $sql.= ", ";
            }
        }
        $sql.= " where id = {$id}";
        $prepare = $connect->prepare($sql);
        return $prepare->execute($data);
    }
    catch(PDOException $e){
        var_dump($e->getMessage());
    }
}
?>