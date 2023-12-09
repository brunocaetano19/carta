<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $endereco = htmlspecialchars($_POST["endereco"]);
    $entrega = isset($_POST["entrega"]) ? 1 : 0;

    $sql = "INSERT INTO cartas_adotadas (nome, telefone, endereco, entrega) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $telefone, $endereco, $entrega);

    if ($stmt->execute()) {
        // Defina um cookie para indicar que uma cartinha foi adotada
        setcookie("cartinha_adotada", "true", time() + (86400 * 30), "/"); // Expira em 30 dias
        echo "Adoção bem-sucedida!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
