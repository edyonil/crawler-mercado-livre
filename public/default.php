<?php

require __DIR__.'/../vendor/autoload.php';

$document = new Edyonil\MercadoLivre\Crawler;

$category = $_GET['value'];

$documennt = $document->execute($category);

header('Content-Type: application/json');
echo json_encode(['data' => $documennt]);