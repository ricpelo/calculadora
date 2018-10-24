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

        extract(array_fill_keys(array_keys(PAR), null));
        $error = [];

        // Comprobación de parámetros:
        $valores = compruebaParametros(PAR, $error);
        extract($valores, EXTR_IF_EXISTS);

        if (empty($error)) {
            // Comprobación de valores:
            compruebaValores($valores, OP, $error);
        }

        formulario($valores, OP);

        if (empty($error)): ?>
            <h3>Resultado: <?= calcula($valores) ?></h3>
        <?php else:
            foreach ($error as $err): ?>
                <h3>Error: <?= $err ?></h3>
            <?php endforeach;
        endif ?>
    </body>
</html>
