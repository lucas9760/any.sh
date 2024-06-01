#!/bin/bash

# Iniciar o servidor PHP temporário
php -S localhost:8000 &
SERVER_PID=$!

# Esperar um pouco para o servidor estar pronto
sleep 2

# Abrir a página HTML no navegador padrão
xdg-open http://localhost:8000/index.html

# Aguardar o usuário fechar o navegador
read -p "Pressione Enter para encerrar o servidor..." -r

# Encerrar o servidor PHP
kill $SERVER_PID
