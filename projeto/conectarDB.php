<?php
$endereco = "localhost";
$banco = "systeste";
$usuario = "postgres";
$senha = "87311126";

    try {
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //echo "Conectado com Sucesso";
    }   catch(PDOException $e) {
        echo "Falha ao conectar ao banco de dados. <br/>";
        die($e->getMessage());
    }

?>