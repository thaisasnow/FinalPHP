<?php
    require_once('repository/chocolateRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeProduto', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-chocolate.php?nome={$nome}");
    exit;