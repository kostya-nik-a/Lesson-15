<?php

require_once 'function.php';
require_once 'table.model.php';
require_once 'users.model.php';

//die(print_r($_SESSION));

if (!empty($_POST['action'])) {
    $params = array_merge([], $_POST);
    switch ($_POST['action']) {
        case 'create':
            createTable();
        break;
        case 'update':
            updateTask($params);
        break;
        case 'insert':
            assignTask($params);
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
                    <h1>Создание таблицы:</h1>
                    <form method="POST" action="" class="form-inline">
                        <input type="text" name="description" placeholder="Имя таблицы" value="" class="form-control">
                        <input type="hidden" name="id" value="">
                        <table class="table table-striped m-t-xl">
                            <thead>
                            <tr>
                                <th>Имя поля</th>
                                <th>Тип поля</th>
                                <th>Длина поля</th>
                                <th>Тип кодировки</th>
                                <th>Auto-Inctiment</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="description" placeholder="Имя поля" value="" class="form-control"></td>
                                    <td>
                                        <select name="sort_by" id="sort" class="form-control">
                                            <option selected disabled>Выберите тип поля</option>
                                            <option value="integer">INT</option>
                                            <option value="varchar">VARCHAR</option>
                                            <option value="text">TEXT</option>
                                            <option value="tinyint">TINYINT</option>
                                            <option value="date">DATE</option>
                                            <option value="datestamp">TIMESTAMP</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="description" placeholder="Длина поля" value="" class="form-control"></td>
                                    <td>
                                        <select name="sort_by" id="sort" class="form-control">
                                            <option selected disabled>Выберите тип кодировки</option>
                                            <option value="utf8">UTF-8</option>
                                            <option value="cp1251">cp1251</option>
                                        </select>
                                    </td>
                                    <td><input name="field_extra[0]" id="field_0_8" type="checkbox" value="AUTO_INCREMENT"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <button type="submit" name="action" value="insert" class="btn btn-success">Добавить поле</button>
                        </div>

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
        <a href="db.list.php">Таблицы</a>
    </body>
</html>