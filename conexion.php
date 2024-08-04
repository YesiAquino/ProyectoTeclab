<?php
$host='localhost';
$bd='bd_ferreteria';
$user='postgres';
$pass='password';

$conexion=pg_connect("host=$host dbname=$bd user=$user password=$pass");

if (!$conexion){
    echo 'Conexión fallida';
}
