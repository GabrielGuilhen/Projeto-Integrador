<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Excluir Atleta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <?php if (isset($atleta)): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 text-danger">Excluir Atleta</h2>
                <a href="<?= URL_BASE ?>/atletas" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="card shadow-sm col-md-6 mx-auto border-danger">
                <div class="card-body p-5 text-center">
                    <i class="bi bi-exclamation-octagon text-danger" style="font-size: 4rem;"></i>
                    <h3 class="mt-3">Tem certeza?</h3>
                    <p class="text-muted">Você está prestes a excluir permanentemente o atleta:</p>
                    <h4 class="fw-bold"><?= $atleta['nome'] ?></h4>
                    <p class="badge bg-light text-dark border"><?= $atleta['clube'] ?></p>
                    
                    <hr class="my-4">

                    <form action="<?= URL_BASE ?>/atletas/deletar" method="post">
                        <input type="hidden" name="id" value="<?= $atleta['id'] ?>">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= URL_BASE ?>/atletas" class="btn btn-secondary px-4">Cancelar</a>
                            <button type="submit" class="btn btn-danger px-4">
                                <i class="bi bi-trash"></i> Confirmar Exclusão
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning shadow-sm">
                <i class="bi bi-exclamation-triangle"></i> Atleta não encontrado.
                <a href="<?= URL_BASE ?>/atletas" class="btn btn-sm btn-warning ms-3">Voltar</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>