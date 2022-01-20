<?php

    //define('ProPayPal', 0); // El cero simboliza entorno de Prueba
    //define('ProPayPal', 1); // El 1 simboliza entorno de producción

    define('ProPayPal', 0);
    if(ProPayPal){
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "https://demo.baulphp.com/paypal-php-integracion-con-ejemplo-completo/");
    define("PayPalENV", "production");
    } else {
    define("PayPalClientId", "ATgx1gVA6Sz2WlU2HHrPM8prLrYRegX1ltgbrEC31-wNPt9XUAAPGqPRBQjILczPkEuscQQNy8g16ncR");
    define("PayPalSecret", "EOlRNc_1wr5XSTqKBWzfjGOS4SqH_ToFbvfY3-DFF8TCKT3ESwS7g-B5HUxpxb177vqOC_SWge2PrvoH");
    define("PayPalBaseUrl", "localhost");
    define("PayPalENV", "sandbox");
    }
?>