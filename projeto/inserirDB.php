<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="JS/estilo.css">
    <?php

    require_once 'conectarDB.php';
    /*
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';
        */



    if (!empty($_POST)){
        //Está chegando dados do POST
    
        try {
            //Preparando as informações para o postgres
            $sql = "insert into teste
                        (name, address, district, city)
                    values
                        (:name, :address, :district, :city)";
            //preparar a SQL
            $stmt = $pdo->prepare($sql);
            //Definir os dados
            $dados = array(
                ':name' => $_POST['nometxt'],
                ':address' => $_POST['endtxt'],
                ':district' => $_POST['bairrotxt'],
                ':city' => $_POST['cidadetxt']
            );
            //tentar inserir os dados (INSERT)
            if($stmt->execute($dados)) {
                echo '<h1>Dados inseridos com sucesso</h1>
                        <a href="projeto.php">Voltar</a>
                ';
            }else {
                echo "Erro na ação";
            }

        } catch(PDOException $e){
            //die($e->getMessage());
            echo "Erro na ação";
        }



    }
    else {
        echo "Erro de acesso!!!";
    }
    die();


    ?>   
