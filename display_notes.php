<?php
//параметры подключения к базе данных
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

// обработка добавления заметки
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $query = "INSERT INTO notes (name, category) values (?,?)";
    //подготовка запроса 
    $stmt = $mesqli->prepare($query);
    //привязка переменных к параметрам подготовленных запросов
    $stmt->bind_param("ss", $name, $category);
    //выполнение подготовленного запроса
    if ($stmt->execute()) {
        echo "Добавлено!";
        //перейти на страницу index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Ошибка добавления: " . $stmt->error;
    }
    $mesqli->close();
}

//вывод данных из таблицы "notes"
$query = "SELECT id, name, category FROM notes";
$result = $mesqli->query($query);

// если что-то сохранено в таблице базы данных, то мы это выводим
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td> 
                <form action='delete_notes.php' method='GET'> 
                    <button type='submit' class='btn' name='remove'onclick='deleteTask({$id})'> Удалить </button> 
                </form> 
            </td>";
        echo "<tr>";
    }
}

//удаление данных
/* if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove'])) {
    $query = "DELETE FROM notes WHERE id = $id";
    $mesqli->query($query);
    $mesqli->close();
    header("Location: index.php");
    exit();
}
 */