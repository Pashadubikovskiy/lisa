<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Якщо користувач не залогінений, перенаправити його на сторінку логіну або вивести повідомлення
    header("Location: login.php"); // Перенаправлення на сторінку логіну
    exit(); // Зупинити виконання скрипта
}