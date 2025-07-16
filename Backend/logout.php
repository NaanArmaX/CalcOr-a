<?php
// Inicia A Sessão no Arquivo
session_start();
// Tira o dado da sessão atual
session_unset();
// Destroi O Dado Atual na sessão
session_destroy();
header("Location: ../Frontend/login.html");
exit;

