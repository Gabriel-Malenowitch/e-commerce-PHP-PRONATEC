<?php
    class Especify{
        public  $pdo;
        function __construct(){
            $this->pdo = new PDO('mysql:host=localhost; dbname=dbloja', 'root', '');
        }
        function delete($command){
            $this->pdo->exec($command);
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
        function update($command){
            try {
                $this->pdo->exec($command);//code...
                return true;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        function get($command){
            try {
                $sql = $this->pdo->prepare($command);
                $sql->execute();
                return $sql->fetchAll();
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }
?>