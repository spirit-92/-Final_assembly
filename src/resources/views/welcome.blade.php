<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="/addAuthor" method="post" style="width: 600px;margin: 0 auto">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">authors</label>
        <select name="authors" class="form-control" id="exampleFormControlSelect1">
            @if(isset($authors))
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">years</label>
        <input type="text" name="years" class="form-control" id="exampleFormControlInput2" placeholder="years">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect3">auditions</label>
        <select name="auditions" class="form-control" id="exampleFormControlSelect1">
            @if(isset($authors))
                @foreach($auditions as $audition)
                    <option value="{{$audition->id}}">{{$audition->city}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
