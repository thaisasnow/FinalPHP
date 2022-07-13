<?php
include('config.php');
require_once('repository/chocolateRepository.php');

$id = $_SESSION['id'];
$chocolate = fnLocalizaChocolatePorId($id);
?>
<!doctype html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro Chocolate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Edição de chocolate</legend>
            <form action="editachocolate.php" method="post" class="form" enctype="multipart/form-data">
                <div class="card col-4 offset-4 text-center">
                    <img src="<?= $chocolate->foto ?>" id="avatarId" class="rounded" alt="foto do chocolate">
                </div>
                <div class="mb-3 form-group">
                    <label for="fotoId" class="form-label">Foto</label>
                    <input type="file" name="foto" id="fotoId" class="form-control">
                    <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>
                <div>
                    <input type="hidden" name="idchocolate" id="chocolateId" value="<?= $chocolate->id ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" value="<?= $chocolate->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome do chocolate</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="descriptionId" class="form-label">descrição</label>
                    <input type="text" name="description" id="descriptionId" class="form-control" placeholder="Descrição" value="<?= $chocolate->description ?>">
                    <div id="helperDescription" class="form-text">Informe a descrição</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="priceId" class="form-label">Preço</label>
                    <input type="number" name="price" id="PriceId" class="form-control" placeholder="Informe o preço" value="<?= $chocolate->price ?>">
                    <div id="helperPrice" class="form-text">Informe o preço</div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>
    
    <script src="js/base64.js"></script>
</body>

</html>