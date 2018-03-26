<?php

require __DIR__.'/../vendor/autoload.php';

$document = new Edyonil\MercadoLivre\Crawler;

$category = $_GET['category'] ?? 'celulares';

$documennt = $document->execute($category);

// $documennt = [
//     [
//         'title' => 'Novo titulo',
//         'link' => 'http://teste.com',
//         'img' => 'https://http2.mlstatic.com/galaxy-j7-D_Q_NP_981002-MLB26975455900_032018-X.jpg',
//         'price' => '345,00',
//         'sold' => '240 vendidos em são paulo'
//     ]
// ];

require __DIR__ ."/../src/Crawler/View/index.php";