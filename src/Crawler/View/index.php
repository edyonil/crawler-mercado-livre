<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mercado Livre Live</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFF;
            color: #666;
        }

        a, a:visited, a:active {
            text-decoration: none;
            color: #666;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }


        header {
            height: 60px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(-135deg, #5FBBDA 0%, #61BEDA 100%);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            position: fixed;
            width: 100%;
        }

        h1 {
            font-size: 20px;
            color: #FFF;
            font-weight: 500
        }
        .search-box {
            display: flex;
            flex: 1;
            justify-content: center;
            padding: 15px;
        }
        .busca {
            margin: 60px 0px 0px 0px;
            width: 100%;
            background-color: #F4F8FB;
            border: 1px solid #E1E5E8;
            height: 50px;
            border-radius: 30px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .busca input, .busca input:focus, .busca input:active {
            border: none;
            background-color: transparent;
            width: 100%;
            height: 50px;
            padding: 0 15px;
            font-size: 16px;
            font-weight: 300;
            color: #9FACB5;
            outline: none;
            box-shadow: none;
        }
        .busca button, .busca button:active, .busca button:focus {
            background-image: linear-gradient(-135deg, #5FBBDA 0%, #61BEDA 100%);
            border-radius: 50%;
            width: 60px;
            outline: none;
            box-shadow: none;
        }

        .list {
            flex: 1;
        }

        .item {
            display: flex;
            flex-direction: row;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
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
            width: 80px;
            height: 80px;
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

        .submenu a {
            position: absolute;
            left: 15px;
            cursor: pointer
        }
        .loading-box {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.3);
        }
        .loading-list-box {
            width: 80%;
            height: 50%;
            margin: 25% auto;
            background-color: #FFF;
            border-radius: 5px;
        }
        .loading-list-box .header{
            background-color: #323F4A;
            height: 40px;
            padding-top: 60px;
            padding-left: 30px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            position: relative;
        }
        .loading-list-box img {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 30px;
            height:30px;
        }
        .loading-list-box .header h3 {
            font-weight: 100;
            font-size: 25px;
            color: #FFF;
        }
        .loading-list {
            background: url("/assets/list-li.png") 30px 0px #FFF repeat-y;
            padding-left: 50px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .loading-list ul, .loading-list ul li {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .loading-list ul {
            margin-left: -25px;
        }
        .loading-list ul li {
            display: block;
            background: url("/assets/list.png") center left no-repeat;
            padding: 20px 0 20px 25px;
        }
    </style>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>


</head>

<body>
<div class="container">
    <header>
        <h1>Mercado Livre Live</h1>
    </header>
    <div class="search-box">
        <div class="busca">
            <input class="search" name="search" placeholder="Procure pelo seu produto"/>
            <button id="request">
                <img src="/assets/search.png"/>
            </button>
        </div>
    </div>
    <div class="list">
        <ul id="productList"></ul>
    </div>

    <div class="loading-box" style="display: none">
        <div class="loading">
            <div class="loading-list-box">
                <div class="header">
                    <h3>Aguarde</h3>
                    <img class="loading-gif" src="/assets/loading.gif" />
                </div>
                <div class="loading-list">
                    <ul>
                        <li class="etapa-1" style="display: none">
                            Acessando Mercado Livre
                        </li>
                        <li class="etapa-2" style="display: none">
                            Baixando os dados
                        </li>
                        <li class="etapa-3" style="display: none">
                            Listando os dados
                        </li>
                        <li class="etapa-4" style="display: none">
                            Processo concluído
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<script>

    var markup = '<a href="${link}" target="_new">' +
        '<div class="item">' +
        '<div class="item-media">' +
        '<img src="${img}" />' +
        '</div>' +
        '<div class="item-body">' +
        '<h4>${title}</h4>' +
        '<p>${brand}</p>' +
        '<div class="item-price">R${price}</div>' +
        '<div class="item-sold">${sold}</div>' +
        '</div>' +
        '</div>' +
        '</a>';

    /* Compile the markup as a named template */
    $.template("movieTemplate", markup);

    function getMovies() {

        var search = $('input[name="search"]').val();

        if (search == "") {
            return;
        }
        var loading = $('.loading-box');
        var etapa1 = $('.etapa-1');
        var etapa2 = $('.etapa-2');
        var etapa3 = $('.etapa-3');
        var etapa4 = $('.etapa-4');

        var loadingGif = $('.loading-gif');
        loadingGif.show();

        loading.fadeIn('show');

        setTimeout(function() {
            etapa1.fadeIn(1000, function () {
                setTimeout(function(){
                    etapa2.fadeIn(1000);
                }, 1000)
            })

        }, 1000);

        setTimeout(function () {

            $.ajax(
                {
                    url: "default.php?value=" + search,
                }
            ).done(function (data) {

                etapa3.fadeIn('slow');
                var movies = data.data;
                //console.log(data.data[0]);

                setTimeout(function () {
                    etapa4.fadeIn('slow');
                    loadingGif.hide()

                    $("#productList").empty();

                    /* Render the template items for each movie
                     and insert the template items into the "movieList" */
                    $.tmpl("movieTemplate", movies)
                        .appendTo("#productList");

                }, 1000);


                setTimeout(function(){
                    loading.fadeOut('slow');
                    etapa1.fadeOut('slow');
                    etapa2.fadeOut('slow');
                    etapa3.fadeOut('slow');
                    etapa4.fadeOut('slow');
                }, 2500)

            });

        }, 2000);

    }

    $("#request").click(function () {
        getMovies();
    });
</script>
</body>
</html>
