<?php
    class DAO{
        public  $pdo;
        function __construct(){
            $this->pdo = new PDO('mysql:host=localhost; dbname=dbloja', 'root', '');
        }
        function delete($table ,$idName, $id){
            if(isset($id)){
                $id = (int) $id;
                $this->pdo->exec("DELETE FROM $table WHERE $idName='$id'");
                return true;
            }else{
                return false;
            }
        }
        function add($table, $lenValues, $values){
            try {
                $sql = $this->pdo->prepare("INSERT INTO $table VALUES $lenValues");
                $sql->execute($values);
                return true;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        function update($table, $valueName, $value, $idName, $id){
            try {
                $this->pdo->exec("update $table set $valueName='$value' where $idName='$id'");//code...
                return true;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        function get($table, $item){
            try {
                $sql = $this->pdo->prepare("SELECT $item FROM $table");
                $sql->execute();
                return $sql->fetchAll();
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }
?>