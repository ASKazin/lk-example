<?php

$pageTitle = 'Личный кабинет абитуриента | ГБПОУ Центр НПМР ЛО';
$h1Title = 'Личный кабинет абитуриента';
$pageDesc = '';

echo '<div class="jumbotron">
  <h1>Уважаемые абитуриенты!</h1>
  <p>Прием документов в электронном виде закрыт.</p>
</div>';

if ($user == true) {
    if ($_GET['status'] == 'complete') {
        echo '<div class="alert alert-success" role="alert">Спасибо.<br><br>
С вами свяжутся.</div>';
    }

    if ($_GET['status'] == 'ok') {
        echo '<div class="alert alert-success" role="alert">Заявление сформировано.<br><br>
Центр осуществляет проверку достоверности сведений, указанных в
заявлении о приеме, и соответствия действительности поданных
электронных образцов документов.<br><br>
Ожидайте ответа о результатах рассмотрения на адрес указанной Вами в
заявлении электронной почты.</div>';
    } else {
        if ($userPosition == '0') {
            if ($userStatus !== '1') {
                echo '<a href="' . BEZ_HOST . '?mode=profile_edit" class="btn btn-warning btn-lg">Заполнить анкету</a><br><br>';
            }
            if ($userNotify == '1' || $_SESSION['notify'] == '1') {
                echo '<h3>Сначала скачайте форму уведомления о намерении обучаться</h3>';
                echo '<a href="' . BEZ_HOST . 'files/UVEDOMLENIE_O_NAMERENII_OBUCHATSJA.doc" class="btn btn-success btn-lg">СКАЧАТЬ</a>';
                echo '<h3>Заполните ее, распечатайте, подпишите, отсканируйте и загрузите ее</h3>';
                echo '<a href="' . BEZ_HOST . '?mode=profile_edit_files4" class="btn btn-success btn-lg">Загрузить скан уведомления о намерении обучаться</a><br><hr><br>';
            }
            echo '<a href="' . BEZ_HOST . '?mode=profile_edit_files" class="btn btn-info btn-lg">Добавить копию паспорта</a><br><br>';
            echo '<a href="' . BEZ_HOST . '?mode=profile_edit_files1" class="btn btn-info btn-lg">Добавить личную фотографию</a><br><br>';
            echo '<a href="' . BEZ_HOST . '?mode=profile_edit_files2" class="btn btn-info btn-lg">Добавить копию документа об образовании</a><br><br>';
            echo '<a href="' . BEZ_HOST . '?mode=profile_edit_files3" class="btn btn-info btn-lg">Добавить копии дополнительных документов</a><hr>';

            if ($testStatus == 1) {
                echo '<a href="' . BEZ_HOST . '?mode=test" class="btn btn-primary btn-lg">Пройти психологическое тестирование</a>';
            }

            $sql2 = 'SELECT * FROM `' . BEZ_DBPREFIX . 'files` WHERE `order_num`=:u_id ORDER BY `create_date` DESC';

            $stmt2 = $db->prepare($sql2);
            $stmt2->bindValue(':u_id', $userId, PDO::PARAM_STR);
            if ($stmt2->execute()) {
                $files = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                foreach ($files as $file) {

                    $f_createdate = date("d.m.Y H:i:s", strtotime($file['create_date']));

                    $filename = $file['file'];
                    $extension = pathinfo($filename)['extension'];

                    if ($file['file_type'] == 2) {
                        if ($extension != 'pdf') {
                            // $files_passport .= '<div class="col-md-3"><div class="panel panel-default"><div class="panel-body"><embed src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" /></div></div></div>';
                            $files_passport .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><a href="' . BEZ_HOST . 'uploads/' . $file['file'] . '" target="_blank"><img src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" class="img img-responsive" alt="Файл PDF"></a></div></div></div>';
                        } else {
                            $files_passport .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><embed src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" /></div></div></div>';
                        }
                    } elseif ($file['file_type'] == 3) {
                        if ($extension != 'pdf') {
                            $files_attestat .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><a href="' . BEZ_HOST . 'uploads/' . $file['file'] . '" target="_blank"><img src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" class="img img-responsive" alt="Файл PDF"></a></div></div></div>';
                        } else {
                            $files_attestat .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><embed src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" /></div></div></div>';
                        }
                    } elseif ($file['file_type'] == 5) {
                        if ($extension != 'pdf') {
                            $files_personal .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><a href="' . BEZ_HOST . 'uploads/' . $file['file'] . '" target="_blank"><img src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" class="img img-responsive" alt="Файл PDF"></a></div></div></div>';
                        } else {
                            $files_personal .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><embed src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" /></div></div></div>';
                        }
                    } elseif ($file['file_type'] == 1) {
                        if ($extension != 'pdf') {
                            $files_misc .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><a href="' . BEZ_HOST . 'uploads/' . $file['file'] . '" target="_blank"><img src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" class="img img-responsive" alt="Файл PDF"></a></div></div></div>';
                        } else {
                            $files_misc .= '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body"><embed src="' . BEZ_HOST . 'uploads/' . $file['file'] . '" /></div></div></div>';
                        }
                    }
                }
                echo '<h3>Паспорт</h3>';
                echo $files_passport . '<div class="clearfix"></div>';
                echo '<h3>Аттестат/Диплом</h3>';
                echo $files_attestat . '<div class="clearfix"></div>';
                echo '<h3>Личное фото</h3>';
                echo $files_personal . '<div class="clearfix"></div>';
                echo '<h3>Прочие документы</h3>';
                echo $files_misc . '<div class="clearfix"></div>';

                echo 'Количество загруженных документов: ' . count($files) . '<hr>';

            } else {
                echo 'Копии документов не найдены.';
            }
        } elseif ($userPosition == '1') {
            header('Location:' . BEZ_HOST . '?mode=admin');
            exit;
        } else {
            header('Location:' . BEZ_HOST . '?mode=error&errorNum=2');
            exit;
        }
    }
} else {
//    echo '<h1 class="text-warning">Подача документов начинается 15 июня 2020 г. в 10:00 по МСК!</h1>';
//    echo '<!-- Yandex.Metrika counter -->
//<script type="text/javascript"> (function (m, e, t, r, i, k, a) {
//    m[i] = m[i] || function () {
//        (m[i].a = m[i].a || []).push(arguments)
//    };
//    m[i].l = 1 * new Date();
//    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
//})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
//ym(64365991, "init", {
//    clickmap: true,
//    trackLinks: true,
//    accurateTrackBounce: true,
//    webvisor: true,
//    trackHash: true
//}); </script>
//<noscript>
//    <div><img src="https://mc.yandex.ru/watch/64365991" style="position:absolute; left:-9999px;" alt=""/></div>
//</noscript> <!-- /Yandex.Metrika counter -->';
//    exit;
    echo '<p>Добро пожаловать в личный кабинет абитуриента.</p>';
    echo '<p>Для подачи документов в наше образовательное учреждение Вам необходимо зарегистрироваться.<br>';
    echo '<div><a href="' . BEZ_HOST . '?mode=reg" class="btn btn-primary btn-lg">Регистрация в личном кабинете</a></div></p>';
    echo '<hr>';
    echo '<p>Вы уже зарегистрированы и хотите дополнить загружаемые документы? Тогда Вам необходимо войти в свой личный кабинет.<br>';
    echo '<div><a href="' . BEZ_HOST . '?mode=auth" class="btn btn-primary btn-lg">Вход в личный кабинет</a></div></p>';
}

$result = 'SELECT COUNT(*) FROM `users`';
$stmt = $db->prepare($result);
$stmt->execute();
$users = $stmt->fetchColumn();

//echo "<hr><strong>Всего подано заявлений:</strong> " . $users . " шт.";