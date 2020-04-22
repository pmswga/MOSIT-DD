<!DOCTYPE html>
<html>
    <head>
        <title>Добавление ИП</title>
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
                                <a class="item" href="add_ip.php">Добавить</a>
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
                                    <a class="item" href="../metodist_profile.php">Мой кабинет</a>
                                    <a class="item" href="../../login.php">Выйти</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <div class="ui grid">
                <div class="row">
                    <div class="one wide column"></div>
                    <div class="fourteen wide column">
                        <div class="ui equal width grid">
                            <div class="column">
                                <fieldset class="ui segment">
                                    <form class="ui form">
                                        <div class="field">
                                            <input type="file">
                                        </div>
                                        <div class="field">
                                            <input type="submit" class="ui primary fluid button" value="Загрузить">
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="one wide column"></div>
                    <div class="fourteen wide column">
                        <fieldset class="ui segment">
                            <legend><h3>Информация о преподавателе</h3></legend>
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>ФИО</th>
                                        <th>Должность</th>
                                        <th>Позиция</th>
                                        <th>Ставка</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Фролов Констанин Констанинович</td>
                                        <td>Профессор</td>
                                        <td>Внешний совместитель</td>
                                        <td>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td>Штатная</td>
                                                        <td>1.0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Штатная-совместителя</td>
                                                        <td>0.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Внешняя-совместителя</td>
                                                        <td>0.0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Список дисциплин за 1-й семестр</h3></legend>
                            <table class="ui table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Наименование дисциплины</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Список дисциплин за 2-й семестр</h3></legend>
                            <table class="ui table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Наименование дисциплины</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Учебно методическая работа</h3></legend>
                            <table class="ui celled table">
                                <col width="1%">
                                <col width="29%">
                                <col width="10%">
                                <col width="10%">
                                <col width="25%">
                                <col width="10%">
                                <col width="10%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">№</th>
                                        <th rowspan="2">Наименование и вид работ</th>
                                        <th colspan="2">Трудоёмкость (час)</th>
                                        <th rowspan="2">Форма окончания работы</th>
                                        <th colspan="2">Срок выполнения (даты)</th>
                                    </tr>
                                    <tr>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                    </tr>
                                </thead>
                                <tbody class="ui form">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="field">
                                                <select>
                                                    <option>Работа А</option>
                                                    <option>Работа Б</option>
                                                    <option>Работа В</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="number">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="number">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <select name="" id="">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="date">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="date">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Научно-исследовательская работа</h3></legend>
                            <table class="ui celled table">
                                <col width="1%">
                                <col width="29%">
                                <col width="10%">
                                <col width="10%">
                                <col width="25%">
                                <col width="25%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">№</th>
                                        <th rowspan="2">Наименование и вид работ</th>
                                        <th colspan="2">Трудоёмкость (час)</th>
                                        <th colspan="2">Срок выполнения (даты)</th>
                                    </tr>
                                    <tr>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                    </tr>
                                </thead>
                                <tbody class="ui form">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="field">
                                                <select>
                                                    <option>Работа А</option>
                                                    <option>Работа Б</option>
                                                    <option>Работа В</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="number">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="number">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="date">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="date">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Организационно-методическая и воспитательная работа</h3></legend>
                            <table class="ui celled table">
                                <col width="1%">
                                <col width="29%">
                                <col width="10%">
                                <col width="10%">
                                <col width="25%">
                                <col width="25%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">№</th>
                                        <th rowspan="2">Наименование и вид работ</th>
                                        <th colspan="2">Трудоёмкость (час)</th>
                                        <th colspan="2">Срок выполнения (даты)</th>
                                    </tr>
                                    <tr>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                    </tr>
                                </thead>
                                <tbody class="ui form">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="field">
                                                <select>
                                                    <option>Работа А</option>
                                                    <option>Работа Б</option>
                                                    <option>Работа В</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <input type="number">
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number">
                                        </td>
                                        <td>
                                            <div class="field">
                                                <select>
                                                    <option>В течении года</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="field">
                                                <select>
                                                    <option>В течении года</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="ui segment">
                            <legend><h3>Общая годовая нагрузка</h3></legend>
                            <table class="ui table">
                                <thead>
                                    <tr>
                                        <th>Виды работ</th>
                                        <th>Планируемая</th>
                                        <th>Фактическая</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Учебная работа</td>
                                        <td>220</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Учебно методическая работа</td>
                                        <td>100,5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Научно-исследовательская работа</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Организационно-методическая и воспитательная работа</td>
                                        <td>22</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Итого</td>
                                        <td>367.5</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <div class="field">
                            <input type="button" class="ui primary button" value="Сохранить">
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