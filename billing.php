<?php
    session_start();

    //Если жетона безопасности (т.е., в нашем случае, 
    //сессионной переменной c названием user) нет, "не пущаем"
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требуется логин!");
    }

?>

<html>
    <head>
        
        <!-- Это комментарий HTML -->
        <meta charset="utf-8" />


        <script>
            function getLog() {
                             
                var url = "api/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                var results = JSON.parse(text);
                console.log(results);
                document.getElementById("display").innerHTML = text;
            }
          

        </script>
    </head>
    <body onload="getLog();">
        <h1>Ваши вычисления</h1>
        <div id="display"></div>
    </body>
</html>