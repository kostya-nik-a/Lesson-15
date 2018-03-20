<?php

require_once 'table.model.php';

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'change':
            editTable('change', $_GET['type']);
            break;
        case 'delete':
            editTable('delete', $_GET['id']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Test</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>База данных содержит следующие таблицы:</h1>
            <form method="POST" action="" class="form-inline">
                <table class="table table-striped m-t-xl">
                    <thead>
                    <tr>
                        <th>Имя таблицы</th>
                        <th>Просмотр таблицы</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                        $allTables[] = showAllTables();

                        foreach ($allTables as $table) {
                            foreach ($table as $tableName) {
                                foreach ($tableName as $value) {
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $value;
                            ?>
                        </td>
                        <td>
                            <div class="form-group">
                                <button type="submit" name="show_table" value="<?= $value?>" class="btn btn-success">Просмотр</button>
                            </div>
                        </td>
                    </tr>

                    <?php
                                }
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<form action="" method="POST">
<?php
if (!empty($_POST['show_table'])) {
?>
<table class="table table-striped m-t-xl">

    <thead>
    <tr>
    <?php
        $discribeTable = describeTable($_POST['show_table']);
    print_r($discribeTable);

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
        <form action="" method="POST">
        <?php
        foreach ($discribeTable as $discribes) {
            foreach ($discribes as $key => $value) {
            ?>
        <td>
            <?php
                echo $value;
                print_r($_GET);
                    if (!empty($_GET) && $_GET['change']) {
            ?>
                <select name="sort_by" id="sort" class="form-control">
                    <option selected disabled>Выберите тип поля</option>
                    <option value="integer">INT</option>
                    <option value="varchar">VARCHAR</option>
                    <option value="text">TEXT</option>
                    <option value="tinyint">TINYINT</option>
                    <option value="date">DATE</option>
                    <option value="datestamp">TIMESTAMP</option>
                </select>
                <input type="text" name="description" placeholder="Длина поля" value="" class="form-control">
            <?php
                    }

            ?>
        </td>
            <?php
        }
        ?>
            <form method="GET">
                <td>
                    <div class="form-group">
                        <button type="submit" name="action" value="change" class="btn btn-success"><a href="?id=<?=$discribes['Field']?>&action=change">Изменить</a></button>
                        <button type="submit" name="action" value="delete" class="btn btn-success"><a href="?id=<?=$discribes['Field']?>&action=delete">Удалить</a></button>
                    </div>
                </td>
            </form>
        </form>
    </tr>
    <?php

    }
}

?>
</form>

<a href="tasks.php">Назад</a>
</body>
</html>