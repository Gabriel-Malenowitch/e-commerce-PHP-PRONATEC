<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../global/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
</head>
<body>
    <form method="GET">
        <input name="name" placeholder="Seu nome" type="text">
        <input name="cep" placeholder="CEP" type="text">
        <input name="cardNumber" placeholder="Numero do cartão" type="text">
        <input name="code" placeholder="Código de segurança do cartão" type="text">
        <button type="submit" >Comprar</button>
    </form>

    <?php
        session_start();
        if(isset($_GET['product'])){
            $_SESSION['product'] = $_GET['product'];
        }
        include '../../Utils/DB/dbEspecify.php';
        $pdo = new Especify();
        

        $lenCliente = '(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,)';
        if(isset($_GET["name"])){
            $values = array('', $_GET['name'], '', $_GET['cep'], '', '', '', $_SESSION['product'], 
                      '', (string) $_GET['cardNumber']. (string) $_GET['code'], '', '', '', '', ''     
            );
            if($pdo->add('Cliente', $lenCliente, $values)){
                echo "<script>alert('O pedido de id ".$_SESSION['product']." será enviado para o cep ".$_GET['cep']." dentro de alguns dias, por favor aguarde')</script>";                
            }else{
                echo '<script>alert("Erro na transação"); reload()</script>';
            }
        }
    ?>

</body>
</html>