<?php
$wet = '2';
echo $wet
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="css/pagestyle.css">
</head>
<body>
   
    <header>  
        <div class="container">
            <div class="row">
                <div class="col-sm-2 title">
                    <h2>Weather<span>News</span></h2>
                </div>
                <div class="col-sm-6 search_tbox">
                    <input type="text" class="text" placeholder="Введите название города">
                </div>
                <div class="col-sm-1 search_bt">
                   <a href="#"><img src="img/search_bt.png" class="pic" alt="Кнопка поиска"></a>
                </div>
                <div class="col-sm-3 time-date">
                    <p id="timedate">16:00 27.05.2017г</p>
                </div>
            </div>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <div class="row">
                <ul class="list-inline">
                    <a href="main.html">
                        <li>Главная</li>
                    </a>
                    <a href="#">
                        <li>Выбрать город</li>
                    </a>
                    <a href="#">
                        <li>Гороскоп</li>
                    </a>
                    <a href="#">
                        <li>О нас</li>
                    </a>
                    <a href="#">
                        <li>Обратная связь</li>
                    </a>
                    <a id="lang" href="#">
                        <li>Рус ▼</li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 ci">
                   <div class="cities_block">
                    <ul class="cities_list">
                            <p id="citieslist_title">Областные центры</p>
                            <a id="" href="#">
                                <li>Винница</li>
                            </a>
                            <a href="#">
                                <li>Волынь</li>
                            </a>
                            <a href="#">
                                <li>Днепр (город)</li>
                            </a>
                            <a href="#">
                                <li>Донецк</li>
                            </a>
                            <a href="#">
                                <li>Житомир</li>
                            </a>
                            <a href="#">
                                <li>Запорожье</li>
                            </a>
                            <a href="#">
                                <li>Ивано-Франковск</li>
                            </a>
                            <a href="#">
                                <li>Киев</li>
                            </a>
                            <a href="#">
                                <li>Кировоград</li>
                            </a>
                            <a href="#">
                                <li>Луганск</li>
                            </a>
                            <a href="#">
                                <li>Львов</li>
                            </a>
                            <a href="#">
                                <li>Николаев</li>
                            </a>
                            <a href="#">
                                <li>Одесса</li>
                            </a>
                            <a href="#">
                                <li>Полтава</li>
                            </a>
                            <a href="#">
                                <li>Ровно</li>
                            </a>
                            <a href="#">
                                <li>Суммы</li>
                            </a>
                            <a href="#">
                                <li>Тернополь</li>
                            </a>
                            <a href="#">
                                <li>Харьков</li>
                            </a>
                            <a href="#">
                                <li>Херсон</li>
                            </a>
                            <a href="#">
                                <li>Хмельницк</li>
                            </a>
                            <a href="#">
                                <li>Черкассы</li>
                            </a>
                            <a href="#">
                                <li>Чернигов</li>
                            </a>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6 weatherblocks">
                    <div class="weather">
                        
                    </div> 
                    <div class="weather">
                        
                    </div>  
                    <div class="weather">
                        
                    </div>  
                    <div class="weather">
                        
                    </div>  
                    <div class="weather">
                        
                    </div>                
                </div>
                <div class="col-md-3 mapblock">
                    <div class="map">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>  
    
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </footer>
</body>
</html>