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
        * {
            margin: 0;
            padding: 0;
        },
        .title {
            height: 50px;
            background-color: ;
        }

    </style>
</head>

<body>
    <div class="center">
        <h1>Mercado Livre Live</h1>

        <div class="list-product">
            <?php foreach($documennt as $d) :?>
            <div class="item">
                <div class="media">
                    <img src="<?php echo $d['img'] ;?>" />
                </div>
                <div class="content">
                    <h4><?php echo trim($d['title']) ;?></h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
