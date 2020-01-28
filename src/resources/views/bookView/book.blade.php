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
    .cardMy{
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
</style>
<body>
<h1 style="text-align: center;margin-top: 50px;">Books</h1>
<div style="width: 600px;margin: 0 auto;" class="input-group flex-nowrap">
    <div class="input-group-prepend">
        <div class="input-group-text" id="addon-wrapping">
            <img style="width: 25px;height: 25px;"  src="data:image/png;base64,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" alt=""></div>
    </div>
    <input type="text" class="form-control" placeholder="Search books" aria-label="Search books" aria-describedby="addon-wrapping">
</div>
@if(isset($books))
    @csrf
    <div style="margin-top: 70px;" class="container">
        <a style="text-align: center" class="nav-item nav-link" href="/AddReader">Add reader</a>
            <div class="row">
                @foreach($books as $book)
                <div class="cardMy col-4">
                    <div class="card" style="width: 18rem;text-align: center">
{{--                        <img src="..." class="cardImg card-img-top" alt="...">--}}
                        <div class="cardImg"></div>
                        <div class="card-body">
                            <h5 class="card-title">Book: {{$book['name']}}</h5>
                            <p class="card-text">Author: {{$book->author->name}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Year: {{$book['year']}}</li>
                            <li class="list-group-item">City:
                                @foreach($book->city as $city)
                                    {{$city->name}}
                                @endforeach
                            </li>
                            <li class="list-group-item">
                            @foreach($book->owner as $owner)
                              Owner:  {{$owner->name}}
                            @endforeach
                            </li>
                        </ul>
                        <div class="card-body">
                            <a href="book/{{$book['id']}}" class="card-link">About book</a>
                            <a  href="bookUpdate/{{$book['id']}}" class="card-link">Editing book</a>
                            <form action="{{url('/bookDelete', ['id' => $book['id']])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit"  class="btn btn-danger" style="margin-top: 15px;">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

@else <h1>Книг нету</h1>
@endif
</body>
</html>

