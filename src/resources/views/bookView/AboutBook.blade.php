<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .cardImg {
        width: 100%;
        height: 150px;
        background: grey;
    }
</style>
<body style="display: flex;justify-content: center;align-items: center;min-height: 100vh; flex-direction: column ">
<?php

//foreach ($book->reader as $reader){
//
//    var_dump($reader['name']);
//}
?>
@if(isset($book))
    <div class="card" style="width: 18rem;">
        <div class="cardImg"></div>
        {{--    <img src="..." class="card-img-top" alt="...">--}}
        <div class="card-body">
            <h5 class="card-title">{{$book['name']}}</h5>
            <p class="card-text">Author: {{$author::find($book['author_id'])->name}}</p>
            <p class="card-text">Year: {{$book['year']}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <h1>Readers</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Reader</th>
            <th scope="col">Rate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($book->baseReader as $readers)
            <tr>
                <th scope="row">{{$readers['id']}}</th>
                <td>{{$readers->reader->name}}</td>
                <td>{{$readers['id_rate']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else <h1>book not found</h1>
@endif
</body>
</html>
