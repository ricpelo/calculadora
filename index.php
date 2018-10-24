<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        require 'auxiliar.php';

        const OP = ['+', '-', '*', '/'];
        const PAR = ['op' => '+', 'op1' => '0', 'op2' => '0'];

        $error = [];

        // Comprobación de parámetros:
        extract(compruebaParametros(PAR, $error));

        // Comprobación de valores:
        if (empty($error)) {
            compruebaValores($op1, $op2, $op, OP, $error);
        }

        formulario($op1, $op2, $op, OP);

        if (empty($error)) {
            mostrarResultado($op1, $op2, $op);
        } else {
            muestraErrores($error);
        } ?>
    </body>
</html>
