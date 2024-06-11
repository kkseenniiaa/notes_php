<?php
$host = "localhost"; //хост базы данных
$username = "root"; //имя пользователя базы данных
$password = ""; //пароль пользователя базы данных
$datebase = "test"; // имя базы данных

//подключение к базе данных
$mesqli = new mysqli($host, $username, $password, $datebase);

// Проверка на ошибки подключения
if ($mesqli->connect_error) {
    die("Ошибка подключения: " . $mesqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($mesqli, $_GET['id']);
    $query = "DELETE FROM notes WHERE id = '$id'";
    $result = mysqli_query($mesqli, $query);
    if ($result) {
        echo 'Успешно удалено!';
    }
}
mysqli_close($mesqli);
