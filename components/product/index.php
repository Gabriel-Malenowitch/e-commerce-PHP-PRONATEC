<?php
    class Product{
        private $img;
        private $dao;
        private $dataPictures;
        public $dataProduct;
        function __construct($dao){
            $this->dao = $dao;
            $this->dataPictures = $this->dao->get("ProdutoFoto", "*");
            $this->dataProduct = $dao->get('Produto', "*");
            $this->dao = $dao;
        }
        function getPictureMain($id, $initialPath){
            $dataPicture = $this->dataPictures[$id];
            return "<img class='pictureMain' src='$initialPath/". (string) $dataPicture[2]. ".jpg' alt='foto do produto'>";
        }
        function print($id, $initialPath){
            echo($this->getPictureMain($id, $initialPath).
                 "<a href='../carPage/index.php?product=$id' class='buyButton'>Comprar</a>".
                 "<div class='title'>". (string) $this->dataProduct[$id][1]."</div>".
                 "<div class='normalPrice price'>Preço normal: R$". (string)  $this->dataProduct[$id][2]."</div>".
                 "<div class='sellingPrice price'>Preço com desconto: R$". (string) $this->dataProduct[$id][3]."</div>".
                 "<button class='buttonDescription'>Mais sobre</button>".
                 "<div class='description'>".$this->dataProduct[$id][4]."</div>");
        }
    }

?>