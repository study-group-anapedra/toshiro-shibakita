<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

// Configuração do PostgreSQL
$servername = "db"; 
$username = "root"; 
$password = "Senha123";
$database = "meubanco";
$port = "5432"; 

// String de conexão PostgreSQL
$conn_string = "host=$servername port=$port dbname=$database user=$username password=$password";
$link = pg_connect($conn_string);

/* check connection */
if (!$link) {
    die("Connection failed: " . pg_last_error());
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();


// A sintaxe SQL de INSERT é compatível entre MySQL e Postgres
$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";


if (pg_query($link, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . pg_last_error($link);
}

pg_close($link);

?>