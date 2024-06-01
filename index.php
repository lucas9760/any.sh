<?php

// Verificar se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter o IP do cliente
    $ipaddress = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }

    // Obter o User-Agent do navegador do cliente
    $useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

    // Salvar o IP e o User-Agent em um arquivo
    $file = 'ip.txt';
    $fp = fopen($file, 'a');
    fwrite($fp, "IP: " . $ipaddress . "\n");
    fwrite($fp, "User-Agent: " . $useragent . "\n\n");
    fclose($fp);

    // Responder com uma mensagem de sucesso
    echo "Dados recebidos com sucesso!";
} else {
    // Responder com uma imagem de exemplo
    header('Content-Type: image/jpeg');
    readfile('example.jpg');
}
