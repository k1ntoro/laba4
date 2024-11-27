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
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>
    <h1>Калькулятор</h1>
    <form method="post">
        <input type="number" name="num1" placeholder="Число 1" required>
        <input type="number" name="num2" placeholder="Число 2" required>
        
        <br>
        <input type="radio" name="operation" value="add" id="add" required> Додавання
        <input type="radio" name="operation" value="subtract" id="subtract" required> Віднімання
        <input type="radio" name="operation" value="multiply" id="multiply" required> Множення
        <input type="radio" name="operation" value="divide" id="divide" required> Ділення
        
        <br><br>
        <button type="submit" name="calculate">Обчислити</button>
    </form>

    <h2>Історія використання</h2>
    <pre>
        <?php
            if (file_exists('history.txt')) {
                echo file_get_contents('history.txt');
            }
            ?>
        </pre>

</body>
</html>
