<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mercado Livre Live</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500');

        * {
            margin:0;
            padding:0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFF;
            color: #666;
        }
        a, a:visited, a:active{
            text-decoration:none;
            color: #666;
        }
        .container {
            display: flex;
        }
        header {
            height: 60px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(-135deg, #5FBBDA 0%, #61BEDA 100%);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            position: fixed;
            width: 100%;
        } h1 {
           font-size: 20px;
           color: #FFF;
           font-weight: 500
        }
        .list {
            margin-top: 45px;
            padding-top: 15px;
            flex: 1;
        } 
        .item {
            display: flex;
            flex-direction: row;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0,0,0, 0.2);
            padding: 10px;
            margin: 10px;
            background-color: #FFF;
        } 
        .item-media {
            border-radius: 5px;
            background-color: #CCC;
            margin-right: 10px;
            width: 80px;
            height: 80px;
        } 
        .item-media img {
            height: 100%;
        }
        .item-body {
            overflow: hidden
        }
        .item-body h4 {
            font-size: 16px;
            color: #666;
            font-weight: 300;
            margin-bottom: 2px;
            line-height: 20px;
        }
        .item-body p {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.3px;
            color: #666;
        }
        .item-body .item-price {
            font-size: 20px;
            font-weight: 500;
            margin-top: 10px;
            display: block;
            color: #5F7E6E;
            margin-bottom: 5px;
        }
        .item-body .item-sold {
            font-size: 12px;
            font-weight: 300;
            color: #CCC;
        }
        .opacity-menu {
            z-index: 1000;
            width: 100%;
            position: absolute;
            height: 100%;
            left:-100%;
            transition:0.5s;
            -webkit-transition:0.5s;
            -moz-transition:0.5s;
        }
        .menu {
            width: 65%;
            position: relative;
            background-color: #fff;
            height: 100%;
            box-shadow: 100px 0px 200px rgba(0,0,0,0.5)
        }
        .opacity-menu.show {
            display: block;
            left:0;
        }
        .menu .submenu {
            position: relative;
        }
        .submenu a {
            position: absolute;
            left: 15px;
            cursor: pointer
        }
        .menu .submenu {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFF;
            background-color: #666;
        }
        .menu ul {
            list-style: none;
            padding-left: 15px;
        } 
        .menu ul li {
            padding: 15px 0px;
            border-bottom: 1px solid #ccc
        }
        .menu ul li:last-child {
            border:0;
        }
        .menu ul li.title-category {
            font-size: 10px;
            text-transform: uppercase;
            padding-bottom: 5px;
        }
        #menuButton {
            position: absolute;
            left: 15px;
            cursor: pointer
        }
    </style>

    <script>

        window.onload = function () {

            let button = window.document.getElementById('menuButton');

            button.addEventListener('click', openMenu, true);

            let buttonInter = window.document.getElementById('menuInter');

            buttonInter.addEventListener('click', openMenu, false);

        }
        function openMenu() {
            
            let menu = window.document.getElementsByClassName('opacity-menu')[0];
            
            menu.classList.toggle('show');
        }
    
    </script>
</head>

<body>
    <div class="opacity-menu">
        <div class="menu">
            <div class="submenu">
                <a id="menuInter">
                    <img src="./assets/arrow-left.png" alt="">
                </a>
                <h2>Menu</h2>
            </div>
            <ul>
                <li class="title-category">Categorias</li>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="./?category=celulares">Celulares</a>
                </li>
                <li>
                    <a href="./?category=televisores">Televisores</a>
                </li>
            </ul>    
        </div>
    </div>
    <div class="container">
        <header>
            <a id="menuButton">
                <img src="/assets/menu.png" alt="Menu">
            </a>
            <h1>Mercado Livre Live</h1>
        </header>
        <div class="list">
            <?php foreach($documennt as $i) :?>
            <a href="<?php echo $i['link'] ;?>" target="_new">
                <div class="item">
                    <div class="item-media">
                        <img src="<?php echo $i['img'] ;?>'" />
                    </div>
                    <div class="item-body">
                        <h4><?php echo $i['title'] ;?></h4>
                        <p>por Saraiva</p>
                        <div class="item-price">R$<?php echo $i['price'] ;?></div>
                        <div class="item-sold"><?php echo $i['sold'] ;?></div>
                    </div>
                </div> 
            </a>
            <?php endforeach ;?>                      
        </div>
    </div>
</body>
</html>
