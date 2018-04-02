<?php

namespace Edyonil\MercadoLivre;

use PHPHtmlParser\Dom;

class Crawler
{
    public function execute($category = 'celulares')
    {
        $dom = new Dom;

        $simbolic = strtolower(str_replace("", "-", $category));
				$category = str_replace("", "%", $category);

        $linkUrl = "https://lista.mercadolivre.com.br/{$simbolic}#D[A:{$category}]";

        $dom->loadFromUrl($linkUrl);

        $itens = $dom->find('.results-item');

        $documennt = [];

        foreach($itens as $item) {

            $img = $item->find('img')[0];

            $title = $item->find('.main-title')[0];

            $a = $item->find('a')[0];

            $img = $img->src ?? $img->getAttribute('data-src');

            $price = $item->find('.price__fraction')[0]->text;

            $decimal = $item->find('.price__decimals')[0];

            $brand = $item->find('.item__brand')[0];

            if (!is_null($brand)) {
                $brand = $brand->text;
            }

            if (is_null($decimal)) {
                $decimal = "00";
            } else {
                $decimal = $decimal->text;
            }

            $mountValue = trim($price) . ',' . $decimal;

            $sold = null;

            if (!is_null($sold = $item->find('.item__condition')[0])) {
                $sold = $sold->text;
            };

            $documennt[] = [
                'img' => $img,
                'title' => trim($title->text),
                'link' => $a->getAttribute('href'),
                'price' => $mountValue,
                'sold' => trim($sold),
                'brand' => $brand
            ];
        }

        return $documennt;
    }
}
