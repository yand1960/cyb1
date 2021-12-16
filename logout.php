<?php

session_start();

// Убиваем жетон безопасности, выданный пользователю,
// что эксивалентно выходу из системы

unset($_SESSION["user"]);
echo('<meta http-equiv="refresh" content="2; URL=index_.html">');
die("Вы вышли из системы!");