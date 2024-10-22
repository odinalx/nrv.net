<?php

use Psr\Container\ContainerInterface;

return [

    'lieu.pdo' => function (ContainerInterface $c) {
        $config = parse_ini_file(__DIR__ . '/lieu.db.ini');
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']}";
        $user = $config['username'];
        $password = $config['password'];
        return new PDO($dsn, $user, $password);
    },

    'soiree.pdo' => function (ContainerInterface $c) {
        $config = parse_ini_file(__DIR__ . '/soiree.db.ini');
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']}";
        $user = $config['username'];
        $password = $config['password'];
        return new PDO($dsn, $user, $password);
    },

    'spectacle.pdo' => function (ContainerInterface $c) {
        $config = parse_ini_file(__DIR__ . '/spectacle.db.ini');
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']}";
        $user = $config['username'];
        $password = $config['password'];
        return new PDO($dsn, $user, $password);
    }


];