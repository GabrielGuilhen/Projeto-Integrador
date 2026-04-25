<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Novo Atleta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="d-flex mt-5">

            <!-- CONTEÚDO -->
            <main class="flex-fill content">

                <!-- TÍTULO + VOLTAR -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Novo Atleta</h2>
                    <a href="<?= URL_BASE ?>/atletas" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>


                <!-- CARD COM FORMULÁRIO -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <?php if (isset($erro_geral)): ?>
                            <div class="alert alert-danger border-0 shadow-sm mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?= $erro_geral ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= URL_BASE ?>/atletas/salvar" method="post" enctype="multipart/form-data">

                            <div class="row g-3">
                                <!-- Nome -->
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $atleta['nome'] ?? '' ?>">
                                    <?php if (isset($erros['nome'])): ?>
                                        <div class="text-danger">
                                            <?= $erros['nome'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>



                                <!-- Altura -->
                                <div class="col-md-4">
                                    <label for="altura" class="form-label">Altura (m)</label>
                                    <input type="number" step="0.01" class="form-control" id="altura" name="altura" value="<?= $atleta['altura'] ?? '' ?>">

                                </div>

                                <!-- Peso -->
                                <div class="col-md-4">
                                    <label for="peso" class="form-label">Peso (kg)</label>
                                    <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="<?= $atleta['peso'] ?? '' ?>">

                                </div>

                                <!-- TREINADOR -->
                                <div class="col-md-6">
                                    <label for="treinador" class="form-label">Treinado por</label>
                                    <input type="text" class="form-control" id="treinador" name="treinador" value="<?= $atleta['treinador'] ?? '' ?>">

                                </div>


                                <!-- Clube -->
                                <div class="col-md-6">
                                    <label for="clube" class="form-label">Clube(Brasil)</label>
                                    <input type="text" class="form-control" id="clube" name="clube" value="<?= $atleta['clube'] ?? '' ?>">

                                </div>

                                <!-- Foto -->
                                <div class="col-md-6">
                                    <label for="foto_url" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto_url" name="foto_url" accept="image/*">

                                </div>
                            </div>

                            <!-- Botão Salvar -->
                            <div class="mt-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-check-circle"></i> Salvar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </main>
        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
