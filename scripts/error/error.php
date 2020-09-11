<?php

$errorNum = isset($_REQUEST['errorNum']) ? $_REQUEST['errorNum'] : false;

$pageTitle = 'Внутренняя ошибка (error id: ' . $_REQUEST['errorNum'] . ')';
$h1Title = 'Ошибка!';
$pageDesc = '';

//echo '<div class="text-muted"> '"</div><br>";
echo '<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Код ошибки:</h3>
  </div>
  <div class="panel-body">' . $_REQUEST['errorNum'] . '</div>
</div>';
switch ($errorNum) {
    case 1:
        echo '<div class="alert alert-info" role="alert">!</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', '!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], '', $_SERVER['REQUEST_URI']);
        break;
    case 2:
        echo '<div class="alert alert-info" role="alert">Ошибка!</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', '!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], '', $_SERVER['REQUEST_URI']);
        break;
    case 3:
        echo '<div class="alert alert-info" role="alert">Ошибка доступа!</div>';
        echo '<div class="alert alert-warning" role="alert">Вы не администратор!</div>';
//        errorLog($_SERVER['PHP_SELF'], 'HIGH', 'Неправильный SSID и IP!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], $_REQUEST['ip']);
        break;
    case 4:
        echo '<div class="alert alert-info" role="alert">Ошибка при отправке письма!</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', '!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], '', $_SERVER['REQUEST_URI']);
        break;
    case 5:
        echo '<div class="alert alert-info" role="alert">Вы уже добавили компанию!</div>';
//        errorLog($_SERVER['PHP_SELF'], 'MEDIUM', 'Пользователь уже добавил компанию!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI']);
        break;
    case 6:
        echo '<div class="alert alert-info" role="alert">!!!!</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', '!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], '', $_SERVER['REQUEST_URI']);
        break;
    case 7:
        echo '<div class="alert alert-info" role="alert">Вы должны <a href="' . BEZ_HOST . '?mode=company_add">добавить компанию</a>!</div>';
//        errorLog($_SERVER['PHP_SELF'], 'LOW', 'Пользователь не добавил компанию!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI']);
        break;
    case 8:
        echo '<div class="alert alert-info" role="alert">Вы должны <a href="' . BEZ_HOST . '?mode=auth">авторизоваться!</div>';
        break;
    case 9:
        echo '<div class="alert alert-info" role="alert">!!!!!</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', '!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], '', $_SERVER['REQUEST_URI']);
        break;
    case 10:
        echo '<div class="alert alert-info" role="alert">Доступ закрыт!</div>';
        echo '<div class="alert alert-info" role="alert">Вы должны <a href="' . BEZ_HOST . '?mode=auth">авторизоваться!</div>';
//        errorLog($_SERVER['PHP_SELF'], 'HIGH', 'Доступ закрыт к этой директории!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI']);
        break;
    default:
        echo '<div class="alert alert-info" role="alert">Неизвестная ошибка.</div>';
//        errorLog($_SERVER['PHP_SELF'], '-', 'Неизвестная ошибка!', $_SESSION['login'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI']);
        break;
}
?>
