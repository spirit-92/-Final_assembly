<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Стили BootsTrap-->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <!--Мои стили-->
    <link rel="stylesheet" href="../style.css">

    <!--Заголовок страницы-->
    <title>Создание фейкового пользователя</title>
</head>
<style>
    .error::placeholder{
        color: red;
    }
    .error{
        border: 2px solid red;
        color: red;
    }
</style>
<body>
<div class="container-fluid
            no-gutters
            row
            p-0">
    <!--Навигация-->
    <div class="border-right
                col-2">
        <ul class="flex-column
                   nav">
            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="usersList.html">Список пользователей</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="eventsList.html">Список мероприятий</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="reportsList.html">Список и просмотр жалоб</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="pushNotification.html">Отправка уведомления</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="sliderProperties.html">Настройка слайдера</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="referalCodesList.html">Список реферальных кодов</a>
            </li>

            <li class="border-bottom
                       nav-item">
                <a class="list-group-item-action
                          list-group-item
                          text-secondary
                          border-0
                          nav-link"
                   href="../index.html">Выход</a>
            </li>
        </ul>
    </div>

    <!--Создание фейкового пользователя-->
    <div class="col-10
                no-gutters">
        <div class="border-bottom
                    no-gutters
                    col-12
                    mb-2">
            <p class="text-secondary
                      text-center
                      py-2
                      pb-3
                      m-0
                      h3">Создание фейкового пользователя</p>
        </div>

        <form action="/userAdd"
              method="post"
              enctype="multipart/form-data"

              class="text-secondary
                     border-bottom
                     p-2">
            @csrf
            <div class="form-group">
                <label for="nameInput">Имя</label>
                <input type="text"
                       class="@if(isset(session('errors')['name'][0]))form-control error @else form-control @endif"
                       name="name"
                       id="nameInput"
                       placeholder="@if(isset(session('errors')['name'][0])){{session('errors')['name'][0]}}@elseВведите имя@endif">
            </div>

            <div class="form-group">
                <label for="userProfilePhoto">Фото</label>
                <div class="userProfilePhoto
                    mb-2">
                    <img src="http://www.bienhealth.com/img/articles/5-genov-forma-chelovecheskogo-litsa.jpg"
                         class="image-fluid"
                         alt="userProfilePhoto">
                </div>

                <div class="custom-file">
                    <input type="file" name="img" class="custom-file-input" id="userProfilePhoto" required>
                    <label class="@if(isset(session('errors')['img'][0]))custom-file-label error @else custom-file-label @endif"
                           for="userProfilePhoto">@if(isset(session('errors')['img'][0])){{session('errors')['img'][0]}}@else Выберите файл @endif</label>
                </div>
            </div>

            <div class="@if(isset(session('errors')['dateBirthday'][0]))form-group error @else form-group @endif">
                <label for="dateBirthday">@if(isset(session('errors')['dateBirthday'][0])){{session('errors')['dateBirthday'][0]}} @else Дата рождения @endif</label>
                <input name="dateBirthday" type="date"
                       id="dateBirthday"
                       class="form-control">
            </div>

            <div class="form-group">
                <label for="userGender">Пол</label>
                <select name="gender" id="userGender"
                        class="form-control">
                    <option value="m">Мужской</option>
                    <option value="w">Женский</option>
                </select>
            </div>
            <div class="form-group">
                <label class="@if(isset(session('errors')['country'][0]))form-group error @else form-group @endif" for="userCountry">@if(isset(session('errors')['country'][0])){{session('errors')['country'][0]}} @else Страна @endif</label>
                <select name="country" id="userCountry"
                        class="form-control">
                    @if(isset($country))
                        @foreach($country as $countrys)
                            <option value="{{$countrys->id}}">{{$countrys->country}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="userCity">Город</label>
                <input name="city" type="text"
                       id="userCity"
                       class="@if(isset(session('errors')['city'][0]))form-group error @else form-group @endif"
                       placeholder="@if(isset(session('errors')['city'][0])){{session('errors')['city'][0]}} @else Укажите город @endif">
            </div>

            <div class="@if(isset(session('errors')['aboutUser'][0]))form-group error @else form-group @endif">
                <label for="userAboutYourself">О себе</label>
                <textarea name="aboutUser" class="form-control"
                          id="userAboutYourself"
                          rows="3"
                          placeholder="@if(isset(session('errors')['aboutUser'][0])){{session('errors')['aboutUser'][0]}} @else Расскажите немного о себе... @endif"></textarea>
            </div>

            <button class="btn
                   btn-primary
                   btn-success"
                    type="submit"
                    aria-pressed="true">Сохранить</button>
        </form>
    </div>
</div>

<!--Скрипты Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

