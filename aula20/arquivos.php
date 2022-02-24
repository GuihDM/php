<?php
/*MANIPULAÇÃO DE ARQUIVOS
fopen() abrir/criar.
fwrite() escrever no arquivo.
fclose() fechar o arquivo. 
feof() durante leitura avisa que
fgets() pega uma linha do arquivo
file_put_contents() cria arquivo
file_get_contents() pega todo o
unlink() Deleta um arquivo.
copy() Copiar arquivo.
*/
$pasta = "arquivos";

if (!is_dir($pasta)){
    mkdir($pasta,0755,true);
}

$nome_arquivo = date('y-m-d-H-i-s').".txt";


$arquivo = fopen("arquivos/$nome_arquivo", 'a+');
fwrite($arquivo, 'Uma linha injetada usando PHP!'.PHP_EOL);
fwrite($arquivo, '2 linha injetada usando PHP!' .PHP_EOL);
fwrite($arquivo, '3 linha injetada usando PHP!' .PHP_EOL);
fclose($arquivo);
$caminho = $pasta.$nome_arquivo;

/*
if (file_exists($caminho) && is_file($caminho)){
    
    echo file_get_contents($caminho);
    
    $abrirArquivo= fopen($caminho, 'r');
    while(!feof($abrirArquivo)){
        echo "<br>".fgets($abrirArquivo)."<br>";
    }
    fclose($abrirArquivo);
}
*/


//Apagar pasta com
//if (is_dir($pasta)){
//  foreach(scandir($pasta) as $arquivo){
//        $caminho= "arquivos/$arquivo";
//       if (is_file($caminho)){
//            unlink($caminho);
//        }
//   }
//    rmdir($pasta);
//}



?>