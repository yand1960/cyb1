<?php
    session_start();

    // Страница получает имя и пароль пользователя со
    // страницы login.php и проверяет их по БД.
    // В случае успеха выписывает "жетон безопасности" 
    // в виде сессионной переменной с названием user 
    // и перенаправляет на страницу индекса.
    // В случае неудачи перенаправляет на страницу логина

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            // Получение файла параметров для подключения к БД
            include(getenv("MYAPP_CONFIG"));

            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];
            $hash = hash('sha256',$pwd);
            $sql = "SELECT ID, UserName 
                    FROM users 
                    WHERE UserName=? AND PwdHash=?
            ";

            // Подключаемся к БД и выполняем sql-запрос
            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //(Нудная, но необходимая процедура передачи параметров 
            //в sql выражение, что гарантирует защиту от инжекции sql)
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement,"ss",$user,$hash);
            mysqli_stmt_execute($statement);
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);

            $result = mysqli_fetch_all($cursor);
            echo(mysqli_error($conn));
            //var_dump($result);
            mysqli_close($conn);


            if(count($result) > 0) {
                echo ("<h2>hello, $user!</h2>");
                $_SESSION["user"] = $user;
                echo('<meta http-equiv="refresh" content="2; URL=calc.php">');
            }
            else {
                echo ("BAD LOGIN!");
                echo('<meta http-equiv="refresh" content="2; URL=login.php">');
            }
        ?>
    </body>
</html>