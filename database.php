<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u800039269_brunocaetano');
define('DB_PASSWORD', 'CVLtr0i4');
define('DB_NAME', 'u800039269_prescrea');

// Cria uma conexão
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criação da tabela cartas_adotadas, se não existir
$sql_cartas_adotadas = "CREATE TABLE IF NOT EXISTS cartas_adotadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    entrega BOOLEAN NOT NULL
)";

if ($conn->query($sql_cartas_adotadas) === TRUE) {
    echo "Tabela 'cartas_adotadas' criada com sucesso ou já existente.";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Criação da segunda tabela, substitua 'nome_da_segunda_tabela' pelo nome desejado
$sql_segunda_tabela = "CREATE TABLE IF NOT EXISTS nome_da_segunda_tabela (
    id INT AUTO_INCREMENT PRIMARY KEY,
    campo1 VARCHAR(255) NOT NULL,
    campo2 VARCHAR(255) NOT NULL,
    campo3 INT NOT NULL
)";

if ($conn->query($sql_segunda_tabela) === TRUE) {
    echo "Tabela 'nome_da_segunda_tabela' criada com sucesso ou já existente.";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}
?>
