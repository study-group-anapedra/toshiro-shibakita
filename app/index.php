<html>
<head>
<title>Exemplo PHP</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

// -------------------------------------------------------------------
// MELHORIA DE BOAS PRÁTICAS: Credenciais lidas de Variáveis de Ambiente
// O valor padrão "db" será o nome do serviço no Docker Compose ou ECS
// -------------------------------------------------------------------
$servername = getenv('DB_HOST') ?: "db"; 
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASSWORD') ?: "Senha123";
$database = getenv('DB_NAME') ?: "meubanco";

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();


// -------------------------------------------------------------------
// QUERY: Adiciona o Hostname do container para demonstrar o balanceamento
// -------------------------------------------------------------------
$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";


if ($link->query($query) === TRUE) {
  echo "New record created successfully on Host: " . $host_name;
} else {
  echo "Error: " . $link->error;
}

?>
</body>
</html>