<?php

    require_once('repository/produtoRepository.php');
    session_start();

    if(fnDeleteProduto($_SESSION['id'])) {
        $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    
    unset($_SESSION['id']);

    $page = "listagem-de-produtos.php";
    setcookie('notify', $msg, time() + 10, "/sgv/{$page}", 'localhost');
    header("location: {$page}");
    exit;