<html>
    <!-- На этой странице пользователь вводит имя и пароль и 
    отправляет их для проверки на страницу check_login.php -->
    <head>
        <!--  -->
        <meta charset="utf-8" />

    
    </head>
    <body>
        <a href="index_.html">Индекс</a>
        <h1>Login, please!</h1>
        <form method="post" action="check_login.php">
            <input name="user" /> <br />
            <input name="pwd" type="password" /> <br />
            <button id="btn1">Go!</button>
        </form>
    </body>
</html>