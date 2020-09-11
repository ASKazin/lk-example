<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 08.11.2016
 * Time: 11:29
 */
?>

<?php
if ($user === false) { ?>
    <li><a href="<?php echo BEZ_HOST; ?>?mode=index">Главная</a></li>
    <li><a href="<?php echo BEZ_HOST; ?>?mode=reg">Регистрация</a></li>
    <li><a href="<?php echo BEZ_HOST; ?>?mode=auth">Вход</a></li>
    <?php
}
if ($user === true) { ?>
    <li><a href="<?php echo BEZ_HOST; ?>?mode=index">Главная</a></li>
    <?php
    if ($userPosition == 1) {
        ?>
        <li><a href="<?php echo BEZ_HOST; ?>?mode=test_result">Результаты тестирования</a></li>
        <li><a href="<?php echo BEZ_HOST; ?>?mode=profile_error">Ошибочные заявления</a></li>
        <li><a href="<?php echo BEZ_HOST; ?>?mode=user_rating">Рейтинг</a></li>
        <li><a href="<?php echo BEZ_HOST; ?>?mode=user_report">Отчет</a></li>
        <?php
    }
    ?>

    <li><a href="<?php BEZ_HOST; ?>?mode=auth&exit=true"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход
            (<?php echo $userLogin; ?>)</a></li>
    <?php
}
?>