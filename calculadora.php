<form method="POST" action="">
    <input type="number" name="num1" placeholder="Número 1" value="<?php echo isset($_POST['num1']) && !isset($_POST['limpiar']) ? $_POST['num1'] : ''; ?>" required>
    
    <select name="operacion">
        <option value="suma" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'suma') ? 'selected' : ''; ?>>Suma (+)</option>
        <option value="resta" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'resta') ? 'selected' : ''; ?>>Resta (-)</option>
        <option value="multiplicacion" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'multiplicacion') ? 'selected' : ''; ?>>Multiplicación (×)</option>
        <option value="division" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'division') ? 'selected' : ''; ?>>División (÷)</option>
    </select>
    
    <input type="number" name="num2" placeholder="Número 2" value="<?php echo isset($_POST['num2']) && !isset($_POST['limpiar']) ? $_POST['num2'] : ''; ?>" required>
    
    <button type="submit" name="calcular">Calcular</button>
    <button type="submit" name="limpiar" style="background-color: #0282f1; color: white;">Limpiar</button>
</form>

<?php
if (isset($_POST['calcular']) && !isset($_POST['limpiar'])) {
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];
    $op = $_POST['operacion'];
    $resultado = 0;
    $error = "";

    if ($op == 'suma') {
        $resultado = $n1 + $n2;
    } elseif ($op == 'resta') {
        $resultado = $n1 - $n2;
    } elseif ($op == 'multiplicacion') {
        $resultado = $n1 * $n2;
    } elseif ($op == 'division') {
        if ($n2 == 0) {
            $error = "Error: No se puede dividir entre cero.";
        } else {
            $resultado = $n1 / $n2;
        }
    }

    echo '<div style="margin-top: 15px; font-weight: bold;">';
    if ($error != "") {
        echo '<span style="color: red;">' . $error . '</span>';
    } else {
        echo 'Resultado: ' . $resultado;
    }
    echo '</div>';
}
?>