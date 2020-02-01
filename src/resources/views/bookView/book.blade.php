<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .cardImg {
        width: 100%;
        height: 150px;
        background: grey;
    }

    .cardMy {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .toast {
        min-width: 200px;
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%);
        top: 50%;
        z-index: 9999;
    }

    .toast-body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100px;
    }
</style>
<body>
@if(session('status'))
    <div data-delay="3000" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <h2>{{session('status')}}</h2>
        </div>
    </div>
@endif
@if(isset($status))
    <div data-delay="3000" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <h2>{{$status}}</h2>
        </div>
    </div>
@endif
<nav class="navbar navbar-dark bg-dark">
    <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style="width: 200px;justify-content: space-evenly;flex-direction: row">
            <li class="nav-item active">
                <a class="nav-link" href="/">Add book <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/AddReader">Add reader</a>
            </li>
        </ul>
    </div>
</nav>

<form method="get" action="/books" style="width: 600px;margin: 0 auto">
    <h3 style="text-align: center;margin-top: 50px;">Search</h3>
    <div class="form-group">
        <label for="exampleInputSearchBook">By book</label>
        <input name="book" type="text" class="form-control" id="exampleInputSearchBook">
    </div>
    <div class="form-group">
        <label for="exampleInputSearchAuthor">By author</label>
        <input name="author" type="text" class="form-control" id="exampleInputSearchAuthor">
    </div>
    <div class="form-group">
        <label for="exampleInputSearchOwner">By owner</label>
        <input name="owner" type="text" class="form-control" id="exampleInputSearchOwner">
    </div>
    <div class="form-group">
        <label for="exampleInputSearchCountry">By country</label>
        <input name="country" type="text" class="form-control" id="exampleInputSearchCountry">
    </div>
    <div class="form-group">
        <label for="exampleInputSearchCity">By city</label>
        <input name="city" type="text" class="form-control" id="exampleInputSearchCity">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

{{--search--}}
@if(isset($searchBook['book'][0][0]))
    <div style="margin-top: 70px;" class="container">
        <h2 style="text-align: center">Search by name book</h2>
        <div class="row">
            @foreach($searchBook['book'] as $book)
                @foreach($book as $bookAtr)
                    <div class="cardMy col-4">
                        <div class="card" style="width: 18rem;text-align: center">
                            {{--<img src="..." class="cardImg card-img-top" alt="...">--}}
                            <div class="cardImg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Book: {{$bookAtr['book_name']}}</h5>
                                <p class="card-text">
                                    Author: {{$authors->find($bookAtr['author_id'])['author_name']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Year: {{$bookAtr['year']}}</li>
                                <li class="list-group-item">City:
                                    @foreach($bookAtr->city as $city)
                                        {{$city->city_name}}
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    @foreach($bookAtr->owner as $owner)
                                        Owner:  {{$owner->owner_name}}
                                    @endforeach
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="book/{{$bookAtr['id']}}" class="card-link">About book</a>
                                <a href="bookUpdate/{{$bookAtr['id']}}" class="card-link">Editing book</a>
                                <a href="/bookDelete/{{$bookAtr['id']}}" class="btn btn-danger"
                                   style="margin-top: 15px;">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endif
@if(isset($searchBook['author'][0][0]))
    <div style="margin-top: 70px;" class="container">
        <h2 style="text-align: center">Search by name author</h2>
        <div class="row">
            @foreach($searchBook['author'] as $book)
                @foreach($book as $bookAtr)
                    <div class="cardMy col-4">
                        <div class="card" style="width: 18rem;text-align: center">
                            {{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                            <div class="cardImg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Book: {{$bookAtr['book_name']}}</h5>
                                <p class="card-text">
                                    Author: {{$authors->find($bookAtr['author_id'])['author_name']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Year: {{$bookAtr['year']}}</li>
                                <li class="list-group-item">City:
                                    @foreach($bookAtr->city as $city)
                                        {{$city->city_name}}
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    @foreach($bookAtr->owner as $owner)
                                        Owner:  {{$owner->owner_name}}
                                    @endforeach
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="book/{{$bookAtr['id']}}" class="card-link">About book</a>
                                <a href="bookUpdate/{{$bookAtr['id']}}" class="card-link">Editing book</a>
                                <a href="/bookDelete/{{$bookAtr['id']}}" class="btn btn-danger"
                                   style="margin-top: 15px;">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endif
@if(isset($searchBook['owner'][0][0]))
    <div style="margin-top: 70px;" class="container">
        <h2 style="text-align: center">Search by name owner</h2>
        <div class="row">
            @foreach($searchBook['owner'] as $book)
                @foreach($book as $bookAtr)
                    <div class="cardMy col-4">
                        <div class="card" style="width: 18rem;text-align: center">
                            {{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                            <div class="cardImg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Book: {{$bookAtr['book_name']}}</h5>
                                <p class="card-text">
                                    Author: {{$authors->find($bookAtr['author_id'])['author_name']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Year: {{$bookAtr['year']}}</li>
                                <li class="list-group-item">City:
                                    @foreach($bookAtr->city as $city)
                                        {{$city->city_name}}
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    @foreach($bookAtr->owner as $owner)
                                        Owner:  {{$owner->owner_name}}
                                    @endforeach
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="book/{{$bookAtr['id']}}" class="card-link">About book</a>
                                <a href="bookUpdate/{{$bookAtr['id']}}" class="card-link">Editing book</a>
                                <a href="/bookDelete/{{$bookAtr['id']}}" class="btn btn-danger"
                                   style="margin-top: 15px;">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endif
@if(isset($searchBook['country'][0][0]))
    <div style="margin-top: 70px;" class="container">
        <h2 style="text-align: center">Search by name country</h2>
        <div class="row">
            @foreach($searchBook['country'] as $book)
                @foreach($book as $bookAtr)
                    <div class="cardMy col-4">
                        <div class="card" style="width: 18rem;text-align: center">
                            {{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                            <div class="cardImg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Book: {{$bookAtr['book_name']}}</h5>
                                <p class="card-text">
                                    Author: {{$authors->find($bookAtr['author_id'])['author_name']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Year: {{$bookAtr['year']}}</li>
                                <li class="list-group-item">City:
                                    @foreach($bookAtr->city as $city)
                                        {{$city->city_name}}
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    @foreach($bookAtr->owner as $owner)
                                        Owner:  {{$owner->owner_name}}
                                    @endforeach
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="book/{{$bookAtr['id']}}" class="card-link">About book</a>
                                <a href="bookUpdate/{{$bookAtr['id']}}" class="card-link">Editing book</a>
                                <a href="/bookDelete/{{$bookAtr['id']}}" class="btn btn-danger"
                                   style="margin-top: 15px;">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endif
@if(isset($searchBook['city'][0][0]))
    <div style="margin-top: 70px;" class="container">
        <h2 style="text-align: center">Search by name city</h2>
        <div class="row">
            @foreach($searchBook['city'] as $book)
                @foreach($book as $bookAtr)
                    <div class="cardMy col-4">
                        <div class="card" style="width: 18rem;text-align: center">
                            {{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                            <div class="cardImg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Book: {{$bookAtr['book_name']}}</h5>
                                <p class="card-text">
                                    Author: {{$authors->find($bookAtr['author_id'])['author_name']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Year: {{$bookAtr['year']}}</li>
                                <li class="list-group-item">City:
                                    @foreach($bookAtr->city as $city)
                                        {{$city->city_name}}
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    @foreach($bookAtr->owner as $owner)
                                        Owner:  {{$owner->owner_name}}
                                    @endforeach
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="book/{{$bookAtr['id']}}" class="card-link">About book</a>
                                <a href="bookUpdate/{{$bookAtr['id']}}" class="card-link">Editing book</a>
                                <a href="/bookDelete/{{$bookAtr['id']}}" class="btn btn-danger"
                                   style="margin-top: 15px;">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endif
<h1 style="text-align: center;margin-top: 50px;">Books</h1>
@if(isset($books))
    <div style="margin-top: 70px;" class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="cardMy col-4">
                    <div class="card" style="width: 18rem;text-align: center">
                        {{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                        <div class="cardImg"></div>
                        <div class="card-body">
                            <h5 class="card-title">Book: {{$book['book_name']}}</h5>
                            <p class="card-text">Author: {{$authors->find($book['author_id'])['author_name']}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Year: {{$book['year']}}</li>
                            <li class="list-group-item">City:
                                @foreach($book->city as $city)
                                    {{$city->city_name}}
                                @endforeach
                            </li>
                            <li class="list-group-item">
                                @foreach($book->owner as $owner)
                                    Owner:  {{$owner->owner_name}}
                                @endforeach
                            </li>
                        </ul>
                        <div class="card-body">
                            <a href="book/{{$book['id']}}" class="card-link">About book</a>
                            <a href="bookUpdate/{{$book['id']}}" class="card-link">Editing book</a>
                            <a href="/bookDelete/{{$book['id']}}" class="btn btn-danger" style="margin-top: 15px;">delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    $('.toast').toast('show')
</script>
</html>

