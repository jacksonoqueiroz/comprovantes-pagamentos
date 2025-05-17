<?php
include 'conexao.php';

// Quantidade por página
$limite = 5;

// Página atual
$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;

// Busca
$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

// Contagem total
$sqlTotal = "SELECT COUNT(*) FROM pagamentos";
$params = [];

if ($busca) {
    $sqlTotal .= " WHERE tipo_conta LIKE :busca OR mes LIKE :busca OR ano LIKE :busca";
    $params[':busca'] = "%$busca%";
}

$stmtTotal = $pdo->prepare($sqlTotal);
foreach ($params as $key => $val) {
    $stmtTotal->bindValue($key, $val);
}
$stmtTotal->execute();
$total = $stmtTotal->fetchColumn();
$totalPaginas = ceil($total / $limite);

// Dados da página
$sql = "SELECT * FROM pagamentos";
if ($busca) {
    $sql .= " WHERE tipo_conta LIKE :busca OR mes LIKE :busca OR ano LIKE :busca";
}
$sql .= " ORDER BY data_pagamento DESC LIMIT :inicio, :limite";

$stmt = $pdo->prepare($sql);

if ($busca) {
    $stmt->bindValue(':busca', "%$busca%", PDO::PARAM_STR);
}
$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->execute();
$comprovantes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Comprovantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2 class="mb-4 text-center">📄 Lista de Comprovantes</h2>

    <!-- Alerta -->
    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-<?= $_GET['msg'] === 'sucesso' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
            <?= $_GET['msg'] === 'sucesso' ? 'Comprovante salvo com sucesso!' : 'Erro ao salvar comprovante.' ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Busca -->
    <form class="row g-3 mb-4" method="get">
        <div class="col-sm-9 col-12">
            <input type="text" name="busca" class="form-control" placeholder="Buscar por tipo, mês ou ano" value="<?= htmlspecialchars($busca) ?>">
        </div>
        <div class="col-sm-3 col-12 d-grid">
            <button type="submit" class="btn btn-primary">🔍 Buscar</button>
        </div>
    </form>

    <!-- Tabela -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Mês</th>
                    <th>Ano</th>
                    <th>Data</th>
                    <th>Arquivo</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($comprovantes) > 0): ?>
                <?php foreach ($comprovantes as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['tipo_conta']) ?></td>
                        <td><?= htmlspecialchars($c['mes']) ?></td>
                        <td><?= htmlspecialchars($c['ano']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($c['data_pagamento'])) ?></td>
                        <td><a href="uploads/<?= htmlspecialchars($c['arquivo']) ?>" target="_blank" class="btn btn-sm btn-outline-success">📎 Abrir</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Nenhum comprovante encontrado.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <?php if ($totalPaginas > 1): ?>
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= ($i == $pagina) ? 'active' : '' ?>">
                        <a class="page-link" href="?pagina=<?= $i ?>&busca=<?= urlencode($busca) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="cadastro.php" class="btn btn-secondary">← Voltar para Cadastro</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
