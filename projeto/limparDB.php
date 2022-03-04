<?php
    require_once 'conectarDB.php';

    //Limpar tabela
    $sql = "delete from teste";
    try {
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            // Execução com sucesso
            echo '<h1>Tabela Limpa com sucesso</h1>
                        <a href="projeto.php">Voltar</a>
                ';
        }else{
            die("Falha ao executar sql..");
        }
        
    } catch(PDOException $e) {
        die($e->getMessage());
    }




    ?>