<?php
include 'conexao.php';

// Verifica se veio tudo
if (isset($_POST['tipo_conta'], $_POST['mes'], $_POST['ano'], $_FILES['arquivo'])) {
    $tipo = $_POST['tipo_conta'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'] === UPLOAD_ERR_OK && $arquivo['type'] === 'application/pdf') {
        $nome_arquivo = time() . '_' . basename($arquivo['name']);
        $caminho_destino = 'uploads/' . $nome_arquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $caminho_destino)) {
            $sql = "INSERT INTO pagamentos (tipo_conta, mes, ano, arquivo, data_pagamento)
                    VALUES (:tipo, :mes, :ano, :arquivo, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':mes', $mes);
            $stmt->bindParam(':ano', $ano);
            $stmt->bindParam(':arquivo', $nome_arquivo);

            if ($stmt->execute()) {
                header('Location: lista.php?msg=sucesso');
                exit;
            } else {
                header('Location: lista.php?msg=erro');
                exit;
            }
        }
    }
}

header('Location: lista.php?msg=erro');
exit;
