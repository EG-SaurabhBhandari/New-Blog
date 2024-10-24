<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}

$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the numbers and operator from the form
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $operator = $_POST['operator'] ?? '';

    // Perform calculation based on the operator
    switch ($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            $result = $num2 != 0 ? $num1 / $num2 : 'Cannot divide by zero';
            break;
        default:
            $result = 'Invalid operation';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Calculator</title>
</head>
<body>
    <div class="calculator-container">
        <h2>Calculator</h2>
        <form action="calculator.php" method="POST">
            <div class="form-group">
                <label for="num1">Number 1:</label>
                <input type="number" name="num1" id="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Number 2:</label>
                <input type="number" name="num2" id="num2" required>
            </div>
            <div class="form-group">
                <label>Operation:</label>
                <select name="operator" required>
                    <option value="add">Add</option>
                    <option value="subtract">Subtract</option>
                    <option value="multiply">Multiply</option>
                    <option value="divide">Divide</option>
                </select>
            </div>
            <button type="submit">Calculate</button>
        </form>
        <?php if ($result !== ''): ?>
            <h3>Result: <?php echo $result; ?></h3>
        <?php endif; ?>
        <a href="index.php" class="button">Back to Welcome Page</a>
    </div>
</body>
</html>
