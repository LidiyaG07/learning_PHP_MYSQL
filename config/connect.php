<?php
    
$connect = mysqli_connect('localhost', 'root', '', 'Test');

// Проверка на ошибку подключения к бд
if (!$connect) {
   die('Error connect to database!');
}