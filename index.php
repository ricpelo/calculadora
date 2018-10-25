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

        try {
            extract(compruebaParametros(PAR, $error));
            formulario($op1, $op2, $op, OP);
            compruebaErrores($error);
            compruebaValores($op1, $op2, $op, OP, $error);
            mostrarResultado($op1, $op2, $op);
        } catch (Exception $e) {
            muestraErrores($error);
        }
        ?>
    </body>
</html>
