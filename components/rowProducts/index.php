<?php
    include './Utils/DB/selectCategories.php';

    class rowProducts{
        private $pdo;
        public $data;
        private $dataPictures;

        function __construct($pdo){
            $this->pdo = $pdo;
            $this->data = new Categories($pdo);
            $this->dataPictures = $this->pdo->get("select * from ProdutoFoto");
        }
        function getPicture($id, $initialPath){
            $dataPicture = $this->dataPictures[$id][2];
            return "<img class='pictureOfRow' src='$initialPath/". (string) $dataPicture. ".jpg' alt='foto do produto'>";
            // return $initialPath;
        }

        function showItens($categoriaId){
            for ($i=0; $i < sizeof($this->data->categoriesAndProducts[$categoriaId]); $i++) { 
                $productId = $this->data->categoriesAndProducts[$categoriaId][$i][2];
                echo '<a href="./pages/productPage/index.php?productId='.$productId.'">'.
                        $this->getPicture($productId, 'productsImg').  
                     '</a>'
                ;
            }
        }
        function print($categoriaId, $categorieName){ 
            //[] categoria
            //[] produto
            //[0/1/2] produto ou categoria ou ProdID
            echo'<div class="container">
                    <h3 class="title">'.$categorieName.'</h3>'.
                    '<div class="viewRow">';
                        $this->showItens($categoriaId);
            echo    '</div>'.
                '</div>' 
            ;
        }
        function printEmpty(){
            echo '<div class="container">
                    <h3 class="title">${$categorieName}</h3>
                    <div class="viewRow">
                        <h2>Sem Itens no estoque no momento</h2>
                    </div>
                </div>';
        }
    }
?>

