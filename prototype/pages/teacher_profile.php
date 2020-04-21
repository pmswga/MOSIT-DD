<!DOCTYPE html>
<html>
    <head>
        <title>Главная</title>
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
                    <div class="ui pointing secondary menu">
                        <a class="header item" href="teacher.php">
                            MOSIT Digital Department
                        </a>
                        <div class="right menu">
                            <a class="item">
                                <i class="ui inbox icon"></i>
                                Поручения
                            </a>
                        </div>
                        <div class="ui dropdown item">
                            Аккаунт
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item">Мой кабинет</a>
                                <a class="item">Выйти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="two column row">
                <div class="nine wide column">
                    <div class="ui segment">

                    </div>
                </div>
                <div class="five wide column">
                    <fieldset class="ui segment">
                        <legend>Мои поручения</legend>

                    </fieldset>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $(".ui.dropdown").dropdown();

        </script>

    </body>
</html>