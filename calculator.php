<?php
if (isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    
    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            $operation_symbol = '+';
            break;
        case 'subtract':
            $result = $num1 - $num2;
            $operation_symbol = '-';
            break;
        case 'multiply':
            $result = $num1 * $num2;
            $operation_symbol = '*';
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
                $operation_symbol = '/';
            } else {
                $result = 'Помилка: ділення на нуль';
                $operation_symbol = '/';
            }
            break;
        default:
            $result = 'Не вибрана операція';
            $operation_symbol = '';
    }

    $history_entry = "$num1 $operation_symbol $num2 = $result\n";
    file_put_contents('history.txt', $history_entry, FILE_APPEND);

    header('Content-Type: text/html; charset=UTF-8');
    echo "<h1>Результат: $num1 $operation_symbol $num2 = $result</h1>";
    echo '<a href="index.html">Повернутися</a>';
}
?>
