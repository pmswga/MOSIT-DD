<!DOCTYPE html>
<html>
    <head>
        <title>О проекте</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="css/semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="vendor/components/jquery/jquery.js"></script>
        <script type="text/javascript" src="css/semantic/semantic.js"></script>
    </head>
    <body>
        <div class="ui stackable grid" id="login_grid">
            <div class="row">
                <div class="column">
                    <div class="ui small menu">
                        <a class="header item" href="index.php">
                            MOSIT Digital Department
                        </a>
                        <a class="item" href="about.php">
                            О проекте
                        </a>
                        <div class="right menu">
                            <a class="item" href="login.php">
                                Войти
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle aligned centered aligned row" id="center">
                <div class="column">
                    <div class="ui middle aligned centered aligned stackable grid">
                        <div class="column">
                            <div class="ui stackable centered grid">
                                <div class="four wide column">
                                    <div class="ui centered fluid image">
                                        <img src="img/cat.png" alt="cat">
                                    </div>
                                </div>
                                <div class="one wide column">
                                    <div class="ui vertical divider">Вход</div>
                                </div>
                                <div class="four wide middle aligned column">
                                    <div class="ui left aligned segment">
                                        <form class="ui form">
                                            <div class="field">
                                                <label>E-mail:</label>
                                                <input type="email">
                                            </div>
                                            <div class="field">
                                                <label>Пароль:</label>
                                                <input type="password">
                                            </div>
                                            <div class=" field">
                                                <a href="pages/metodist.php" class="ui primary button">Войти как методист</a>
                                            </div>
                                            <div class=" field">
                                                <a href="pages/teacher.php" class="ui primary button">Войти как преподаватель</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                12
                </div>
            </div>
        </div>
    </body>
</html>