<!DOCTYPE html>
<html>
    <head>
        <title>Архивные ИП</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../../css/semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../../css/main.css">
        <script type="text/javascript" src="../../vendor/components/jquery/jquery.js"></script>
        <script type="text/javascript" src="../../css/semantic/semantic.js"></script>
    </head>
    <body>
    <div class="ui stackable grid">
        <div class="row">
            <div class="column">
                <div class="ui small menu">
                    <a class="header item" href="../metodist.php">
                        MOSIT Digital Department
                    </a>
                    <div class="ui dropdown item">
                        Индивидуальные планы
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="view_ip.php">Просмотр</a>
                            <a class="item" href="add_ip.php">Добавить</a>
                            <a class="item" href="archive_ip.php">Архив</a>
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
                        <div class="ui dropdown item">
                            Мой аккаунт
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="metodist_profile.php">Мой кабинет</a>
                                <a class="item" href="../../login.php">Выйти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column row">
            <div class="one wide column"></div>
            <div class="fourteen wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="sixteen wide column">
                            <div class="ui grid">
                                <div class="column">
                                    <fieldset class="ui segment">
                                        <legend><h3>Фильтр</h3></legend>
                                        <form class="ui form">
                                            <div class="three fields">
                                                <div class="field">
                                                    <select>
                                                        <option>По ФИО</option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="field">
                                                    <input type="text" placeholder="Введите данные для поиска">
                                                </div>
                                                <div class="field">
                                                    <input type="button" class="ui fluid primary button" value="Найти">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label>По учебном году</label>
                                                <select>
                                                    <option>2019/2020</option>
                                                    <option>2018/2019</option>
                                                    <option>2017/2018</option>
                                                    <option>2016/2017</option>
                                                    <option>2015/2016</option>
                                                    <option>2014/2015</option>
                                                </select>
                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="sixteen wide column">
                            <fieldset class="ui segment">
                                <legend><h3>Индивидуальные планы</h3></legend>
                                <table class="ui celled table">
                                    <col width="5%">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Преподаватель</th>
                                        <th>ИП</th>
                                        <th>Учебный год</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Заур Амурбиевич</td>
                                        <td>
                                            <p style="color: red">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 1
                                            </p>
                                            <p style="color: green">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 2
                                            </p>
                                        </td>
                                        <td>
                                            2016/2017
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Фролов Константин Константинович</td>
                                        <td>
                                            <p style="color: red">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 1
                                            </p>
                                            <p style="color: green">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 2
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Кораблин Юрий Прокофьевич</td>
                                        <td>
                                            <p style="color: red">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 1
                                            </p>
                                            <p style="color: green">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 2
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Берков Николай Андреевич</td>
                                        <td>
                                            <p style="color: red">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 1
                                            </p>
                                            <p style="color: green">
                                                <i class="ui icon file excel"></i>
                                                Индивидуальный план 2
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(".ui.dropdown").dropdown();

    </script>

    </body>
</html>
