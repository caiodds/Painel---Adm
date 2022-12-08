<?php
define('HOST','localhost');
define('USER','root');
define('PASS','123456');
define('BASE','formulario');

$con = new mysqli(HOST,USER,PASS,BASE);
if ($con==true) {
    echo "Conexão bem realizada";
}else{
    echo "Erro ao se conectar";
}
?>