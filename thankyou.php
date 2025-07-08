<?php
$params = [];
foreach ($_GET as $key => $value) {
    $params[] = htmlspecialchars($key) . ' = ' . htmlspecialchars($value);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>
<body>

<h1>Спасибо за регистрацию!</h1>

<?php if (!empty($params)): ?>
    <p>Вы передали данные:</p>
    <ul>
        <?php foreach ($params as $line): ?>
            <li><?= $line ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Параметры не переданы.</p>
<?php endif; ?>

</body>
</html>
