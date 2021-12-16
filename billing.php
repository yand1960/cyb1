<?php
    session_start();

    //Страница, показывающая историю вычилений текущего пользователя.
    //Получает данные от сервиса get_log.php, запрашивая его с помощью JS

    //Если жетона безопасности (т.е., в нашем случае, 
    //сессионной переменной c названием user) нет, "не пущаем"
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требуется логин!");
    }

?>

<html>
    <head>       
        <meta charset="utf-8" />

        <script>
            function getLog() {
                 
                //Запрос веб-службы
                var url = "api/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                //Десериализация массива данных их полученного текста
                var results = JSON.parse(text);
                console.log(results);
                //Формирование читаемого текста из десериализованного массива
                var out = "";
                var counter = 0;
                for(var i=0; i < results.length; i++) {
                    var calc = results[i];
                    console.log(calc);
                    var x = calc[1];
                    var y = calc[2];
                    var z = calc[3];
                    out += "X:" + x + " Y:" + y + " Result: " + z + "<br />";
                    counter += 1;
                }
                //Вывод данных
                document.getElementById("display").innerHTML = out;
                document.getElementById("amount").innerText =
                    "С вас, сударь, $" + counter;
            }
        </script>

    </head>
    <body onload="getLog();">
        <a href="index_.html">Индекс</a>
        <h1>Ваши вычисления</h1>
        <div id="display"></div>
        <h2 id="amount"></h2>
    </body>
</html>