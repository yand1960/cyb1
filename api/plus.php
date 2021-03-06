<?php

//Основная служба в этом приложении. Принимает данные от пользователя,
//выполняет сложение, возвращает результат. Логирует эти данные в БД,
//добавляя еще имя пользователя и время.

//Сессия нужна, чтобы извлечь из нее имя пользователя
session_start();
$user = $_SESSION["user"];

//Числа для сложения извлекаются из адресной строки запроса барузера, 
//типа http://.../api/plus.php?x=1&y=2
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;

// Логирование вычисления в БД
// Здесь нарушены принципы безопасности:
// 1. Принцип наименьших привилегий
// 2. Слабый пароль
// 3. Секрет в коде
//$conn = mysqli_connect("localhost","root","","calc");
// 4. Код, уязвим для Sql-injection
//Первые три проблемы исправлены ниже:

// Секрет вынесен в отдельный конфигурационный файл, путь к которому  
// должен быть указан в переменной окружения MYAPP_CONFIG
include(getenv("MYAPP_CONFIG"));

// Подключаемся к БД и выполняем sql-запрос
$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);

// Уязвимость sql-injection оставлена для хакерских упражнений
$sql = "INSERT INTO log(Number1,Number2,Result,UserID,Timestamp) 
        VALUES($x,$y,$z,'$user',now())";
mysqli_query($conn,$sql);
echo(mysqli_error($conn));
mysqli_close($conn);

//Вернуть пользователю результаты вычисления:
echo($z);