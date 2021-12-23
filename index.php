<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global/style.css">
    <link rel="stylesheet" href="./global/indexStyle.css">
    <link rel="stylesheet" href="./components/rowProducts/style.css">
    <title>Mega Store</title>
</head>
<body>
    <h1 class='welcome'>Mega Store</h1>
    <?php
        include './Utils/DB/index.php';
        include './Utils/DB/dbEspecify.php';
        include './components/rowProducts/index.php';

        $pdo = new Especify();
        $row = new rowProducts($pdo);
        
        $categories = $row->data->categoriesAndProducts;
        for ($i=0; $i < sizeof($categories); $i++){
            if(isset($categories[$i][0][1])){
                $categorieName = $categories[$i][0][1];
                $row->print($i, $categorieName);
            }
        }
    ?>
</body>
</html>