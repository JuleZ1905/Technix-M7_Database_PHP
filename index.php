<?php

require_once 'vendor/autoload.php';

$connectionParams = [
    'dbname' => 'lessressources',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

$queryBuilder = $conn->createQueryBuilder();
$queryBuilder
    ->select('*')
    ->from('ressource')
    ->where('Menge = ?')
    ->setParameter(0, '55189')
;

$result = $queryBuilder->executeQuery()->fetchAssociative();

var_dump($result);