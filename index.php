<?php

// Assuming you installed from Composer:
require "vendor/autoload.php";
use PHPHtmlParser\Dom;

$dom = new Dom;
$dom->loadFromUrl('https://celulares.mercadolivre.com.br/');

//echo $dom->innerHtml;exit;

$itens = $dom->find('.results-item');

$documennt = [];
foreach($itens as $item) {

    //var_dump(get_class_methods($item)); exit();

	$img = $item->find('img')[0];

	$title = $item->find('.main-title')[0];

	$img = $img->src ?? $img->getAttribute('data-src');

	$documennt[] = [
	    'img' => $img,
        'title' => trim($title->text)
    ];
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>

    <style>
        body {
            background-color: azure;
        }
        div.center {
            padding: 20px;
        }
        ul {
            list-style: none;
        }
        li {
            width: 400px;
            box-shadow: 0 0 30px #CCC;
            background-color: #FFF;
            padding: 20px;
            border-radius: 10px;
            margin: 30px 15px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>Lista de produtos do mercado livre</h1>

        <ul>
            <?php foreach($documennt as $d) :?>
                <li>
                    <h4><?php echo trim($d['title']) ;?></h4>
                    <img src="<?php echo $d['img'] ;?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>
