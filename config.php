<?php
/**
 * Конфигурационный файл
 * Site: https://zerobot.ru
 * Регистрация пользователя письмом
 */

//Ключ защиты
if (!defined('BEZ_KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('404.html'));
}

//Адрес базы данных
define('BEZ_DBSERVER', 'localhost');

//Логин БД
define('BEZ_DBUSER', '');

//Пароль БД
define('BEZ_DBPASSWORD', '');

//БД
define('BEZ_DATABASE', '');

//Префикс БД
define('BEZ_DBPREFIX', '');

//Errors
define('BEZ_ERROR_CONNECT', 'Немогу соеденится с БД!');

//Errors
define('BEZ_NO_DB_SELECT', 'Данная БД отсутствует на сервере!');

//Адрес хоста сайта
define('BEZ_HOST', 'https://' . $_SERVER['HTTP_HOST'] . '/');

//Адрес почты от кого отправляем
define('BEZ_MAIL_AUTOR', 'Регистрация в ЛК абитуриента Центр НПМР ЛО <lk@med-lo.ru>');
?>