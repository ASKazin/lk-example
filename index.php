<?php

session_start();

//Устанавливаем кодировку и вывод всех ошибок
header('Content-Type: text/html; charset=UTF8');

//Включаем буферизацию содержимого
ob_start();

//Версия системы
$version = '2.0.10 (build 1) от 24.08.20';

//Определяем переменную для переключателя
$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : false;
$userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : false;
$userLogin = isset($_SESSION['userLogin']) ? $_SESSION['userLogin'] : false;
$userPosition = isset($_SESSION['userPosition']) ? $_SESSION['userPosition'] : false;
$userStatus = isset($_SESSION['userStatus']) ? $_SESSION['userStatus'] : false;
$testStatus = isset($_SESSION['testStatus']) ? $_SESSION['testStatus'] : false;
$userNotify = isset($_SESSION['notify']) ? $_SESSION['notify'] : false;
$err = array();

define('ROOT_DIR', dirname(__FILE__));

//Устанавливаем ключ защиты
define('BEZ_KEY', true);

//Подключаем конфигурационный файл
include 'config.php';

//Подключаем скрипт с функциями
include 'func/func.php';

//подключаем MySQL
include 'bd/bd.php';

switch ($mode) {
    // Подключаем обработчик с формой регистрации
    case 'reg':
        include 'scripts/reg/reg.php';
        //include 'scripts/reg/reg_form.html';
        break;

    // Подключаем обработчик с формой авторизации
    case 'auth':
        include 'scripts/auth/auth.php';
        //include 'scripts/auth/auth_form.html';
        break;

    case 'profile_edit':
        include 'scripts/profile/profile_edit.php';
        include 'scripts/profile/profile_edit.html';
        break;

    case 'profile_edit_par':
        include 'scripts/profile/profile_edit_par.php';
        include 'scripts/profile/profile_edit_par.html';
        break;

    case 'profile_edit_files':
        include 'scripts/profile/profile_edit_files.php';
        include 'scripts/profile/profile_edit_files.html';
        break;

    case 'profile_edit_files1':
        include 'scripts/profile/profile_edit_files1.php';
        include 'scripts/profile/profile_edit_files1.html';
        break;

    case 'profile_edit_files2':
        include 'scripts/profile/profile_edit_files2.php';
        include 'scripts/profile/profile_edit_files2.html';
        break;

    case 'profile_edit_files3':
        include 'scripts/profile/profile_edit_files3.php';
        include 'scripts/profile/profile_edit_files3.html';
        break;

    case 'profile_edit_files4':
        include 'scripts/profile/profile_edit_files4.php';
        include 'scripts/profile/profile_edit_files4.html';
        break;

    case 'profile_edit_docs':
        include 'scripts/profile/profile_edit_docs.php';
        include 'scripts/profile/profile_edit_docs.html';
        break;

    case 'admin':
        include 'scripts/admin/admin.php';
        include 'scripts/admin/admin.html';
        break;

    case 'user_view':
        include 'scripts/user/user.php';
        include 'scripts/user/user.html';
        break;

    case 'profile_error':
        include 'scripts/user/user_error.php';
        include 'scripts/user/user_error.html';
        break;

    case 'user_print':
        include 'scripts/print/print.php';
        include 'scripts/print/print.html';
        break;

    case 'user_rating':
        include 'scripts/user/user_rating.php';
        include 'scripts/user/user_rating.html';
        break;

    case 'user_report':
        include 'scripts/user/user_report.php';
        include 'scripts/user/user_report.html';
        break;

    case 'error':
        include "scripts/error/error.php";
        break;

    case 'test_admin':
        include 'scripts/test/test_admin.php';
        include 'scripts/test/test_admin.html';
        break;

    case 'test':
        include 'scripts/test/test.php';
        break;

    case 'test1':
        include 'scripts/test/test1.php';
        break;

    case 'test2':
        include 'scripts/test/test2.php';
        break;

    case 'test3':
        include 'scripts/test/test3.php';
        break;

    case 'test4':
        include 'scripts/test/test4.php';
        break;

    case 'test5':
        include 'scripts/test/test5.php';
        break;

    case 'test6':
        include 'scripts/test/test6.php';
        break;

    case 'test7':
        include 'scripts/test/test7.php';
        break;

    case 'test8':
        include 'scripts/test/test8.php';
        break;

    case 'test9':
        include 'scripts/test/test9.php';
        break;

    case 'test10':
        include 'scripts/test/test10.php';
        break;

    case 'test11':
        include 'scripts/test/test11.php';
        break;

    case 'test12':
        include 'scripts/test/test12.php';
        break;

    case 'test13':
        include 'scripts/test/test13.php';
        break;

    case 'test14':
        include 'scripts/test/test14.php';
        break;

    case 'test15':
        include 'scripts/test/test15.php';
        break;

    case 'test16':
        include 'scripts/test/test16.php';
        break;

    case 'test17':
        include 'scripts/test/test17.php';
        break;

    case 'test18':
        include 'scripts/test/test18.php';
        break;

    case 'test19':
        include 'scripts/test/test19.php';
        break;

    case 'test20':
        include 'scripts/test/test20.php';
        break;

    case 'test_final':
        include 'scripts/test/test_final.php';
        break;

    case 'test_result':
        include 'scripts/test/test_result.php';
        break;

    case 'print_result':
        include 'scripts/print/print_test.php';
        break;

    // Подключаем обработчик главной страницы
    case 'index':
    case '':
        include 'scripts/index/index.php';
        include 'scripts/index/index.html';
        break;
}

//Получаем данные с буфера
$content = ob_get_contents();
ob_end_clean();

//Подключаем наш шаблон
include 'html/index.html';
