<!-- http://localhost/dbLoja/pages/productPage/index.php?productId=99 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../global/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../components/product/style.css">
    <?php 
        include '../../Utils/DB/index.php';
        include '../../components/product/index.php';

        $dao = new DAO();
        $product = new Product($dao);

        echo "<title>". (string) $product->dataProduct[$_GET['productId']][1]."</title>
        </head>
        <body>";

        echo $product->print($_GET['productId'], "../../productsImg")
    ?>
</body>
</html>