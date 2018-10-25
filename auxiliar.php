<?php

function compruebaErrores($error)
{
    if (!empty($error)) {
        throw new Exception;
    }
}

function muestraErrores($error)
{
    foreach ($error as $err): ?>
        <h3>Error: <?= $err ?></h3>
    <?php endforeach;
}

function mostrarResultado($op1, $op2, $op)
{ ?>
    <h3>Resultado: <?= calcula($op1, $op2, $op) ?></h3>
<?php
}

function compruebaParametros($par, &$error)
{
    if (!empty($_GET)) {
        if (empty(array_diff_key($_GET, $par)) &&
            empty(array_diff_key($par, $_GET))) {
            return array_map('trim', $_GET);
        } else {
            $error[] = "Los parámetros recibidos no son los correctos.";
        }
    }
    return $par;
}

function compruebaValores($op1, $op2, $op, $ops, &$error)
{
    if (!is_numeric($op1)) {
        $error[] = "El primer operando no es un número.";
    }
    if (!is_numeric($op2)) {
        $error[] = "El segundo operando no es un número.";
    }
    if (!in_array($op, $ops)) {
        $error[] = "El operador no es válido.";
    }
    compruebaErrores($error);
}

function selected($op1, $op2)
{
    return $op1 == $op2 ? "selected" : "";
}

function formulario($op1, $op2, $op, $ops)
{
?>
    <form action="" method="get">
        <label for="op1">Primer operando *:</label>
        <input id="op1" type="text" name="op1" value="<?= $op1 ?>"><br/>
        <label for="op2">Segundo operando *:</label>
        <input id="op2" type="text" name="op2" value="<?= $op2 ?>"><br/>
        <label for="op">Operación *:</label>
        <select name="op">
            <?php foreach ($ops as $o): ?>
                <option value="<?= $o ?>" <?= selected($op, $o) ?> >
                    <?= $o ?>
                </option>
            <?php endforeach ?>
        </select><br/>
        <input type="submit" value="Calcular">
    </form>
<?php
}

function calcula($op1, $op2, $op)
{
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
    return $res;
}
