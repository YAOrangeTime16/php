<?php
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];

    $pdo = new pdo(
        'mysql:host=localhost;dbname=mym;charset=utf8',
        'root',
        'root',
        $options
    );