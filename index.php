<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заметки</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Добавить заметку</h1>
    <form action="display_notes.php" method="post">
        <label>
            <span class="title_input">Название:</span>
            <input type="text" id="name" name="name" require class="field_input">
        </label>
        <br>
        <label>
            <span class="title_input">Категория:</span>
            <select name="category" id="category">
                <option value="Книга">Книга</option>
                <option value="Мультфильм">Мультфильм</option>
                <option value="Фильм">Фильм</option>
            </select><br>
        </label>
        <button type="submit" class="btn">Добавить</button>
    </form>
    <h1>Заметки</h1>
    <table class="table">
        <tr class="table__header">
            <th class="th"><b>Название</b></th>
            <th class="th"><b>Категория</b></th>
        </tr>
        <?php include 'display_notes.php'; ?>
    </table>
    <script src="script.js"></script>
</body>

</html>