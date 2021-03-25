# Задачник

Онлайн смотреть тут http://parser.gulyasmir.ru/
Цель - написать задачник на PHP не используя фреймворки.

Для запуска у себя нужно:
1. Склонировать себе командой git clone https://github.com/gulyasmir/tasks.git
2. Изменить настройки конфигурации в папке config
 - в файле database.php настройки подключения к БД
 - в файле paths.php - Прописываем Url.  Например 'http://parser.gulyasmir.ru/' или 'https://js.gulyasmir.ru/tasks/'
 - в файле config.php - можно изменить количество выводимых задач на странице.
3. Залить себе БД (файл phpmvc.sql)

Используется сервер с PHP 7, MySQL 5.7
