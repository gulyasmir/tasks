<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задачник</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../public/css/style.css" rel="stylesheet" >
</head>
<body>

<?php Session::init(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div id="header">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URL; ?>index">Список задач</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>index/create">Добавить задачу</a>
                    </li>
                    <li class="nav-item">
                        <?php if(Session::get('loggedIn') == true):?>
                            <a class="nav-link" href="<?php echo URL; ?>index/logout">Выйти</a>
                        <?php else: ?>
                            <a class="nav-link" href="<?php echo URL; ?>login">Войти</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div id="content"></div>
<div class="container">