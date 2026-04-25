<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • <?= isset($atleta['id']) ? 'Editar' : 'Novo' ?> Atleta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><?= isset($atleta['id']) ? 'Editar' : 'Novo' ?> Atleta</h2>
            <a href="<?= URL_BASE ?>/atletas" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/atletas/<?= isset($atleta['id']) ? 'atualizar' : 'salvar' ?>" method="post">
                    <?php if (isset($atleta['id'])): ?>
                        <input type="hidden" name="id" value="<?= $atleta['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $atleta['nome'] ?? '' ?>">
                        <?php if (isset($erros['nome'])): ?>
                            <div class="text-danger small"><?= $erros['nome'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" id="peso" name="peso" step="0.01" value="<?= $atleta['peso'] ?? '' ?>">
                        <?php if (isset($erros['peso'])): ?>
                            <div class="text-danger small"><?= $erros['peso'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura <?= isset($atleta['id']) ? : '' ?></label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="altura" name="altura" step="0.01" value="<?= $atleta['altura'] ?? '' ?>">
                            </button>
                        </div>

                     <div class="mb-3">
                        <label for="clube" class="form-label">Clube <?= isset($atleta['id']) ? : '' ?></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="clube" name="clube" value="<?= $atleta['clube'] ?? '' ?>">
                            </button>
                        </div>

                        <div class="mb-3">
                        <label for="treinador" class="form-label">Treinador <?= isset($atleta['id']) ? : '' ?></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="treinador" name="treinador" value="<?= $atleta['treinador'] ?? '' ?>">
                            </button>
                        </div> 
                        <div class="mb-3">
                        <label for="foto" class="form-label">Trocar Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <form method="POST" enctype="multipart/form-data">
                        </div>

                    </div>



                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> <?= isset($atleta['id']) ? 'Atualizar' : 'Salvar' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleAltura = document.querySelector('#toggleAltura');
        const alturaInput = document.querySelector('#altura');
        const iconAltura = document.querySelector('#iconAltura');

        if (toggleAltura) {
            toggleAltura.addEventListener('click', function() {
                const type = alturaInput.getAttribute('type') === 'password' ? 'text' : 'password';
                alturaInput.setAttribute('type', type);

                iconAltura.classList.toggle('bi-eye');
                iconAltura.classList.toggle('bi-eye-slash');
            });
        }
    </script>
</body>

</html>

