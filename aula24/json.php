<?php
/*
$texto = '{
    "cep": "58057-275",
    "logradouro": "Rua José Gomes Amarantes",
    "complemento": "",
    "bairro": "Mangabeira",
    "localidade": "João Pessoa",
    "uf": "PB",
    "ibge": "2507507",
    "gia": "",
    "ddd": "83",
    "siafi": "2051"
  }';


$dados = json_decode($texto, true);

//echo "<h1>$dados->bairro</h1>";
echo "<h1>".$dados['cep']."</h1>";

$dadostxt = json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
var_dump($dadostxt);
*/
$texto = $_POST['texto'];
$dados = json_decode($texto, true);

$dados['professor'] = "lindo";

$json = json_encode($dados);

echo $json;





?>