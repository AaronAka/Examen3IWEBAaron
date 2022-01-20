<?php 
session_start();

unset($_SESSION['login']);
unset($_SESSION['usuario']);
unset($_SESSION['google_login']);

header('Location: /index.php');