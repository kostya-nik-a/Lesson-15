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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>База данных содержит следующие таблицы:</h1>

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
                        $i = 0;
                        foreach ($allTables as $tables) {
                            foreach ($tables as $tableNames) {
                                foreach ($tableNames as $tableName) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $tableName;
                                            $i++;
                                            ?>
                                        </td>
                                        <td>
                                            <form method="POST" action="db.veiw.php" class="form-inline">
                                            <div class="form-group">
                                                <input type="hidden" name="table" value="<?php echo $tableName ?>">
                                                <button type="submit" class="btn btn-success">Просмотр</button>

                                            </div>
                                            </form>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                    ?>
                    </tbody>
                </table>

        </div>
    </div>
</div>



<a href="index.php">Назад</a>
</body>
</html>