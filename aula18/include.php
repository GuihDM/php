<?php
//INCLUDE E REQUIRE

include_once('teste.php');//se falhar, continua o codigo
echo "<br>";
require_once('teste.php');//se falhar, interrompe o codigo onde falhar.
echo "<br><br>Continua executando codigo"
?>