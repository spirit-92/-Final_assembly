<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> FeelReal Admin </title>
    <link href="http://93.119.155.54:1100/css/style.css?ver=05092019" rel="stylesheet">
    <link href="http://93.119.155.54:1100/css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="http://93.119.155.54:1100/css/jquery.fancybox.min.css"/>
</head>
<body>
<header class="header ">
    <div class="header__wrap row">
        <span class="header__name">FeelReal Admin Panel</span>
        <span class="header__title">Запахи</span>
        <a href="/admin/logout"><img src="http://93.119.155.54:1100/img/Admin.svg" alt="Logout"></a>
    </div>
</header>
<div class="row content">
    <div class="sidebar">
        <div class="sidebar__heading">
            <img src="http://93.119.155.54:1100/img/avatar.svg" alt="Avatar" class="sidebar__avatar">
            <span>Добро пожаловать, admin</span>
        </div>
        <a class="sidebar__menu"><img src="http://93.119.155.54:1100/img/menu.svg" alt="Menu-open"></a>
        <ul class="sidebar__list">
            <li>
                <a href="main.html" class="sidebar__link">Запахи</a>
            </li>
        </ul>
    </div>
    <div class="main">

        <div class="main__wrap" id="primary">
            <h2 class="main__title">Добавить запах</h2>
            <div id="modalAdd">
                <form method="post" id="perfume_form" class="main__add" action="/perfumes">
                    @csrf
                    <div class=" main__item">
                        <label class="main__clause">Имя </label>
                        <input id="name" name="name" type="text" class="main__input" placeholder="Введите имя">

                    </div>
                    <div class=" main__item">
                        <label class="main__clause">Slug </label>
                        <input id="slug" name="slug" type="text" class="main__input" placeholder="Введите slug">
                    </div>
                    <div class=" main__item">
                        <label class="main__clause">Описание </label>
                        <textarea id="description" rows="10" name="description" class="main__input"
                                  placeholder="Введите описание"></textarea>
                    </div>
                    <div class=" main__item">
                        <label id="big_icon_label" class="main__clause">Большая иконка</label>
                        <input id="big_icon" name="big_icon" type="file">
                    </div>
                    <div class=" main__item">
                        <label id="small_icon_label" class="main__clause">Маленькая иконка </label>
                        <input id="small_icon" name="small_icon" type="file">
                    </div>
                    <div class=" main__item">
                        <label class="main__clause">Категория</label>
                        <div class="main__selectBox">
                            <select id="category" name="category" class="main__select">
                                <option value="1"
                                        class="main__clause">Action
                                </option>
                                <option value="2"
                                        class="main__clause">Nature
                                </option>
                                <option value="3"
                                        class="main__clause">Food
                                </option>
                                <option value="5"
                                        class="main__clause">City
                                </option>
                                <option value="6"
                                        class="main__clause">Village
                                </option>
                                <option value="7"
                                        class="main__clause">Aroma
                                </option>
                                <option value="8"
                                        class="main__clause">Flowers
                                </option>
                                <option value="11"
                                        class="main__clause">Lifestyle
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row main__item main__location">
                        <button id="save_perfumes_button" type="submit" class="main__save">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
