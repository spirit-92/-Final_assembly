<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$book['name']}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
<div style="margin-top: 100px;">
    <h1 style="text-align: center">Book edit: {{$book['name']}}</h1>
<form style="width: 600px;margin: 0 auto" action="{{url('/PutBook', ['id' => $book['id']])}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="exampleInputText">Name</label>
        <input name="name" type="text" value="{{$book['name']}}" class="form-control" id="exampleInputText" aria-describedby="textHelp">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Authors</label>
        <select name="authors" class="form-control" id="exampleFormControlSelect1">
            @if(isset($authors))
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputYear">Year</label>
        <input value="{{$book['year']}}" name="years" type="number" class="form-control" id="exampleInputYear" aria-describedby="textHelp">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect3">Owners</label>
        <select name="auditions" class="form-control" id="exampleFormControlSelect1">
            @if(isset($owners))
                @foreach($owners as $owner)
                    <option value="{{$owner->id}}">{{$owner->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
</body>
</html>
