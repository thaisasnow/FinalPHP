<?php

    require_once('repository/chocolateRepository.php');
    require_once('util/base64.php');

    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);

    $foto = converterBase64($_FILES['foto']);

    if(empty($nome) || empty($description) || empty($price) || empty($foto)) {
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddProduto($nome, $foto, $description, $price)) {
            $msg = "Sucesso ao gravar";
        } else {
            $msg = "Falha na gravação";
        }
    }
    
    $page = "formulario-cadastra-produto.php";
    setcookie('notify', $msg, time() + 10, "sga/{$page}", 'localhost');
    
    header("location: {$page}");
    exit;