<?php
    require_once('repository/ChocolateRepository.php');
    require_once('util/base64.php');
    session_start();

    $id = filter_input(INPUT_POST, 'idChocolate', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);

    $foto = converterBase64($_FILES['foto']);

    if(fnUpdateChocolate($id, $nome, $foto, $descricao, $preco)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
    
    $_SESSION['id'] = $id;
    $page = "formulario-edita-Chocolate.php";
    setcookie('notify', $msg, time() + 10, "sgv/{$page}", 'localhost');
    header("location: {$page}");
    exit;