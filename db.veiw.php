<?php

require_once 'table.model.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Test</title>
</head>
<body>

<form action="" method="POST">
    <?php
    if (!empty($_POST['table'])) {
    ?>
    <h2>Структура таблицы: <?php echo $_POST['table']; ?></h2>
    <table class="table table-striped m-t-xl">

        <thead>
        <tr>
            <?php
            $discribeTable = describeTable($_POST['table']);

            foreach ($discribeTable as $discribes) {
                foreach ($discribes as $key => $value) {
                    ?>
                    <th><?php echo $key; ?> </th>
            <?php
                }
                break;
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <tr>
                <?php
                foreach ($discribeTable as $discribes) {
                foreach ($discribes as $key => $value) {
                    ?>
                    <td>
                        <?php
                        echo $value;

                        if (!empty($_GET)) {
                            $tableName = $_GET['table'];
                            echo $tableName;
                            switch ($_GET['action']) {
                            case 'change':
                                ?>
                                <input type="text" name="" placeholder="Введите новое название поля" value="">
                                    <select name="sort_by" id="sort" class="form-control">
                                        <option selected disabled>Выберите тип поля</option>
                                        <option value="integer">INT</option>
                                        <option value="varchar">VARCHAR</option>
                                        <option value="text">TEXT</option>
                                        <option value="tinyint">TINYINT</option>
                                        <option value="date">DATE</option>
                                        <option value="datestamp">TIMESTAMP</option>
                                    </select>
                                <input type="text" name="description" placeholder="Длина поля" value=""
                                       class="form-control">
                                <?php
                                editTable('change', $tableName , $discribes);
                                break;

                                case 'delete':
                                    editTable('delete', $tableName , $_GET['id']);
                                    break;
                                }
                        }

                        ?>
                    </td>
                    <?php
                }
                ?>
                <td>
                    <form method="GET">
                        <div class="form-group">
                            <button type="submit" name="action" value="change" class="btn btn-success"><a href="?table=<?=$_POST['table']?>&id=<?=$discribes['Field']?>&action=change">Изменить</button>
                            <button type="submit" name="action" value="delete" class="btn btn-success"><a href="?id=<?=$discribes['Field']?>&action=delete">Удалить</a></button>
                        </div>
                    </form>

                </td>
        </tr>
        <?php

        }
        }

        ?>
        <a href="db.list.php">Назад</a>
</form>

</body>
</html>
