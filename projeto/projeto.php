<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro no banco de dados</title>
    <link rel="stylesheet" href="JS/estilo.css">
    <?php

require_once 'conectarDB.php';

$sql = "select * from teste";

try {
    $dadostabela = array();
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        // Execução com sucesso
        $dadostabela += $stmt->fetchAll();
        /*echo '<pre>';
        print_r($dadostabela);
        echo '<pre>';*/
    }else{
        die("Falha ao executar sql..");
    }
    
} catch(PDOException $e) {
    die($e->getMessage());
}


?>
</head>
<body>
    <h1>Insira seus dados</h1>
    <form action="inserirDB.php" method="post">
        <input type="text" placeholder="Nome" id="nometxt" name="nometxt">
        <input type="text" placeholder="Endereço" id="endtxt" name="endtxt">
        <input type="text" placeholder="Bairro" id="bairrotxt" name="bairrotxt">
        <input type="text" placeholder="Cidade" id="cidadetxt" name="cidadetxt">
        <button type="submit"class="botao" name="botao" >Enviar</button>
    </form>

    <?php if(!empty($dadostabela)) { ?>
      
        
            <table>
          
                <thead>
                    <tr>
                        <th class="cabecalho" scope="col">#</th>
                        <th class="cabecalho" scope="col">Nome</th>
                        <th class="cabecalho" scope="col">Endereço</th>
                        <th class="cabecalho" scope="col">Bairro</th>
                        <th class="cabecalho" scope="col">Cidade</th>
                    </tr>
                </thead>
                <tbody id="tabela">
                    <?php $id = 0;
                    foreach($dadostabela as $a) { ?>
                        <tr>
                           <th class="cabecalho" scope="row"><?php ; 
                           echo $id+=1; ?></th> 
                           <td><?php echo $a['name']; ?></td>
                           <td><?php echo $a['address']; ?></td>
                           <td><?php echo $a['district']; ?></td>
                           <td><?php echo $a['city']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
          
            </table>
      </div> 
    <a href="limparDB.php">Limpar tabela</a> 
    <?php } ?>


    
    


    <script src="JS/jquery-3.6.0.js"></script>
    <script src="JS/javascript.js"></script>
    
</body>
</html>