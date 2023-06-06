<?php

require_once '../config/connect.php';

$id_teams = $_GET['id_teams'];
$teams_first = $_POST['teams_1'];
$teams_second = $_POST['teams_2'];
$Goals_scored_first = $_POST['Goals_scored_first'];
$Goals_scored_second = $_POST['Goals_scored_second'];

// Запрос на получение значений из базы данных
mysqli_query($connect, "INSERT INTO `Matches` (`ID`, `id_teams`, `Teams`, `Goals scored`, `Goals conceded`) VALUES (NULL, '$id_teams', '$teams_first', '$Goals_scored_first', '$Goals_scored_second');");
mysqli_query($connect, "INSERT INTO `Matches` (`ID`, `id_teams`, `Teams`, `Goals scored`, `Goals conceded`) VALUES (NULL, '$id_teams', '$teams_second', '$Goals_scored_second', '$Goals_scored_first');");


// Возвращение на главную страницу index.php
header('Location: /');