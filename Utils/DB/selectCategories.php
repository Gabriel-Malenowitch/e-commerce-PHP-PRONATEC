<?php
    class Categories{
        private $pdoEspecify;
        public $categories;
        public $categoriesAndProducts = Array();
        function __construct($pdoEspecify){
            $this->pdoEspecify = $pdoEspecify;
            $this->categories = $this->getCategories();
            $this->getCategoriesAndProducts();
        }
        function getCategories(){
            return $this->pdoEspecify->get("select * from categoria");
        }
        function configCategoriesAndProducts($id){
            $command = "
            select 
            Produto.ProdNome,
            subcategoria.SubCatNome,
            Produto.ProdID
            from 
            Produto INNER JOIN subcategoria ON 
            produto.SubCatID=subcategoria.SubCatID 
            AND
            subcategoria.CatID = $id";
            return $this->pdoEspecify->get($command);
        }
        function getCategoriesAndProducts(){
            $sizeOfCategories = sizeof($this->categories);
            for ($i=0; $i < $sizeOfCategories; $i++){
                $id = (string) $this->categories[$i][0];
                array_push($this->categoriesAndProducts,$this->configCategoriesAndProducts($id));
            }
        }

    }
?>