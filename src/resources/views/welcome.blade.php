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
<style>
    .error{
        border: 2px solid red;
        padding-left: 10px;
    }
    .error::placeholder{
        color: red;
    }
    .formBook{
        margin-top: 80px;
    }
</style>


<body>
<h1 style="text-align: center;margin-top: 20px;">Add Book</h1>
<div class="formBook">
<form action="/books" method="get" style="width: 600px;margin: 0 auto">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input
            class="@if(isset(session('errors')['name']))form-control error @else form-control @endif"
               type="text" name="name" class="form-control"
               id="exampleFormControlInput1"
               placeholder="@if(isset(session('errors')['name']))
                {{session('errors')['name'][0]}}
               @elseВведите имя@endif"
        >
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">authors</label>
        <select name="authors" class="form-control" id="exampleFormControlSelect1">
            @if(isset($authors))
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->author_name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">years</label>
        <input
            type="text" name="years"
            class="@if(isset(session('errors')['years']))form-control error @else form-control @endif"
            id="exampleFormControlInput2"
            placeholder="@if(isset(session('errors')['years']))
                {{session('errors')['years'][0]}}
            @elseВведите год@endif"
        >
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect3">auditions</label>
        <select name="auditions" class="form-control" id="exampleFormControlSelect1">
            @if(isset($owners))
                @foreach($owners as $owner)
                    <option value="{{$owner->id}}">{{$owner->owner_name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
<?php
session(['key' => false]);?>
