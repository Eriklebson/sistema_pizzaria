<?php 
    function findAll($table, $fields = '*'){
        try{
            $connect = connect();

            $query= $connect->query("select {$fields} from {$table}");
            return $query->fetchAll();
        }
        catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }
    function findBy($table, $filter, $fields = '*'){
        try{
            $connect = connect();
            $prepare = $connect->prepare("select {$fields} from {$table} {$filter}");
            $prepare->execute();
            return $prepare->fetch();
        }
        catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }
?>