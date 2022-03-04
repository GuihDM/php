<?php

require_once 'conectarDB.php';

$sql = "select * from teste";

try {
    $dadostabela = array();
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        // Execução com sucesso
        $dadostabela += $stmt->fetchAll();
        echo '<pre>';
        print_r($dadostabela);
        echo '<pre>';
    }else{
        die("Falha ao executar sql..");
    }
    
} catch(PDOException $e) {
    die($e->getMessage());
}








?>