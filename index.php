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
                    <h1>Создание таблицы:</h1>
                    <form method="POST" action="" class="form-inline">
                        <input type="text" name="tableName" placeholder="Имя таблицы" value="" class="form-control">
                        <input type="hidden" name="id" value="id">
                        <table class="table table-striped m-t-xl">
                            <thead>
                            <tr>
                                <th>Имя поля</th>
                                <th>Тип поля</th>
                                <th>Длина поля</th>
                                <th>Тип кодировки</th>
                                <th>Auto-Inctiment</th>
                                <th>Ключ</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="description" placeholder="Имя поля" value=""
                                               class="form-control"></td>
                                    <td>
                                        <select name="type_field" id="sort" class="form-control">
                                            <option selected disabled>Выберите тип поля</option>
                                            <option value="int">INT</option>
                                            <option value="varchar">VARCHAR</option>
                                            <option value="text">TEXT</option>
                                            <option value="tinyint">TINYINT</option>
                                            <option value="date">DATE</option>
                                            <option value="datestamp">TIMESTAMP</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="lenght" placeholder="Длина поля" value=""
                                               class="form-control"></td>
                                    <td>
                                        <select name="type_code" id="sort" class="form-control">
                                            <option selected disabled>Выберите тип кодировки</option>
                                            <option value="utf8">UTF-8</option>
                                            <option value="cp1251">cp1251</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input name="extra" type="checkbox" value="AUTO_INCREMENT">
                                    </td>
                                    <td>
                                        <input name="key" type="checkbox" value="">
                                </tr>
                                </td>
                            </tbody>
                        </table>

                        <div class="row" style="padding: 20px 0;">
                            <div class="col-lg-4">
                                    <div class="form-group">
                                        <button type="submit" name="action" value="create" class="btn btn-success">Создать</button>
                                    </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
        if (!empty($_POST)) {
            print_r($_POST);

            createTable($_POST);
        echo "<h1>Таблица <strong><i>".$_POST['tableName']."</i></strong> создана успешно</h1>." ;
        }
?>
        <p>Перейти к просмотру <a href="db.list.php">Таблиц</a></p>
    </body>
</html>