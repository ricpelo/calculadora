<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php

        const OP = ['+', '-', '*', '/'];

        function selected($op1, $op2)
        {
            return $op1 == $op2 ? "selected" : "";
        }

        $op1 = isset($_GET['op1']) ? trim($_GET['op1']) : '0';
        $op2 = isset($_GET['op2']) ? trim($_GET['op2']) : '0';
        $op  = isset($_GET['op'])  ? trim($_GET['op'])  : '+';
        $res = '';
        ?>
        <form action="" method="get">
            <label for="op1">Primer operando:</label>
            <input id="op1" type="text" name="op1" value="<?= $op1 ?>"><br/>
            <label for="op2">Segundo operando:</label>
            <input id="op2" type="text" name="op2" value="<?= $op2 ?>"><br/>
            <label for="op">Operación:</label>
            <select name="op">
                <?php foreach (OP as $o): ?>
                    <option value="<?= $o ?>" <?= selected($op, $o) ?> >
                        <?= $o ?>
                    </option>
                <?php endforeach ?>
            </select><br/>
            <input type="submit" value="Calcular">
        </form>
        <?php
        switch ($op) {
            case '+':
                $res = $op1 + $op2;
                break;
            case '-':
                $res = $op1 - $op2;
                break;
            case '*':
                $res = $op1 * $op2;
                break;
            case '/':
                $res = $op1 / $op2;
                break;
        }
        ?>
        <h3>Resultado: <?= $res ?></h3>
    </body>
</html>
