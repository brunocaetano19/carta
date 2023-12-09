<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém dados do formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $endereco = htmlspecialchars($_POST["endereco"]);
    $entrega = isset($_POST["entrega"]) ? 1 : 0;

    // Insere dados no banco de dados usando declaração preparada
    $sql = "INSERT INTO cartas_adotadas (nome, telefone, endereco, entrega) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $telefone, $endereco, $entrega);

    // Exemplo de tratamento de erros
    if ($stmt->execute()) {
        echo "Adoção bem-sucedida!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close(); // Fecha a declaração preparada
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea JR. - Cartinhas de Natal</title>
    <!-- Adicione outros meta tags, links para folhas de estilo, etc., conforme necessário -->
</head>
<body>
    <!-- Seu conteúdo HTML vai aqui -->

    <!-- Exemplo de exibição segura na página -->
    <p>Adoção bem-sucedida para: <?php echo htmlspecialchars($nome); ?></p>

    <!-- Adicione o restante do seu conteúdo HTML conforme necessário -->

</body>
</html>
