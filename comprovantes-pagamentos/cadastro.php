<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Comprovantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h3 class="mb-4 text-center">Cadastro de Comprovantes</h3>
    <form action="salvar.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tipo_conta" class="form-label">Tipo de Conta</label>
            <select class="form-select" id="tipo_conta" name="tipo_conta" required>
                <option value="">Selecione</option>
                <option value="Luz">Luz</option>
                <option value="Água">Água</option>
                <option value="Telefone">Telefone</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mes" class="form-label">Mês</label>
            <select class="form-select" id="mes" name="mes" required>
                <option value="">Selecione o mês</option>
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Março">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" id="ano" name="ano" min="2000" max="2100" required>
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Comprovante (PDF)</label>
            <input type="file" class="form-control" id="arquivo" name="arquivo" accept="application/pdf" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <div class="mt-3 text-center">
            <a href="lista.php">Ver comprovantes salvos</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
