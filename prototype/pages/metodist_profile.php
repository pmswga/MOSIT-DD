<!DOCTYPE html>
<html>
    <head>
        <title>Аккаунт</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script type="text/javascript" src="../vendor/components/jquery/jquery.js"></script>
        <script type="text/javascript" src="../css/semantic/semantic.js"></script>
    </head>
    <body>
    <div class="ui stackable grid">
        <div class="row">
            <div class="column">
                <div class="ui small menu">
                    <a class="header item" href="metodist.php">
                        MOSIT Digital Department
                    </a>
                    <div class="ui dropdown item">
                        Индивидуальные планы
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="ips/view_ip.php">Просмотр</a>
                            <a class="item" href="ips/add_ip.php">Добавить</a>
                            <a class="item" href="ips/archive_ip.php">Архив</a>
                        </div>
                    </div>
                    <div class="ui dropdown item">
                        Протоколы
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item">Просмотр</a>
                            <a class="item">Добавить</a>
                        </div>
                    </div>
                    <div class="right menu">
                        <a class="item">
                            <i class="ui inbox icon"></i>
                            Поручения
                        </a>
                    </div>
                    <div class="ui dropdown item">
                        Мой аккаунт
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="metodist_profile.php">Мой кабинет</a>
                            <a class="item" href="../login.php">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="two column row">
            <div class="one wide column"></div>
            <div class="fourteen wide column">
                <fieldset class="ui segment">
                    <legend>Информация об аккаунте</legend>
                    <table class="ui definition table">
                        <tbody>
                            <tr>
                                <td>E-mail</td>
                                <td>mosit@yandex.ru</td>
                            </tr>
                            <tr>
                                <td>Тип аккаунта</td>
                                <td>Методист</td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
                <fieldset class="ui segment">
                    <legend>Информация об сотруднике</legend>
                    <table class="ui definition table">
                        <tbody>
                            <tr>
                                <td>Фамилия</td>
                                <td>Михайлова</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>Евгения</td>
                            </tr>
                            <tr>
                                <td>Отчество</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td>+7 (123) 456-78-90</td>
                            </tr>
                            <tr>
                                <td>Институт</td>
                                <td>ИТ</td>
                            </tr>
                            <tr>
                                <td>Кафедра</td>
                                <td>МОСИТ</td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(".ui.dropdown").dropdown();

    </script>

    </body>
</html>