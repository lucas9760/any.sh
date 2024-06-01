#!/bin/bash

# Iniciar o servidor PHP
php -S localhost:8000 &
echo "Servidor PHP iniciado em localhost:8000"

# Esperar alguns segundos para garantir que o servidor PHP esteja funcionando
sleep 3

# Obter o IP e a imagem usando o script PHP
IP_IMAGE=$(curl -s http://localhost:8000/)

# Exibir o IP e a imagem no terminal
echo "$IP_IMAGE"

# Encerrar o servidor PHP
killall php
