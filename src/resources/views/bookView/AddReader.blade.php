<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="get" action="/PostReader" style="width: 500px;margin:0 auto;padding-top: 100px">
    @csrf
    <h1 style="text-align: center">Add reader book</h1>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Reader</label>
        <select name="reader" class="form-control" id="exampleFormControlSelect1">
            @foreach($readers as $reader)
                <option value="{{$reader['id']}}">{{$reader['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Book</label>
        <select name="book" class="form-control" id="exampleFormControlSelect2">
            @foreach($books as $book)
                <option value="{{$book['id']}}">{{$book['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect3">Rate</label>
        <select name="rate" class="form-control" id="exampleFormControlSelect3">
            @foreach($rate as $rateBook)
                <option value="{{$rateBook['id']}}">{{$rateBook['id']}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add read book</button>
</form>
</body>
</html>
