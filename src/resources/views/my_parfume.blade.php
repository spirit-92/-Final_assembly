<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (!empty($parfume)) {

    $img = $parfume[2]->big_img;
    var_dump($img);
    var_dump(asset('storage/img/Dimas/big_icon/vx0BKoSsIRs0FsCWmkZy5qGWfBZE8LPes99OgK3X.png'));
    var_dump(asset('storage/img/Dima/big_icon/vx0BKoSsIRs0FsCWmkZy5qGWfBZE8LPes99OgK3X.png'));
}
?>
<img src="{{asset('storage/img/Dima/big_icon/vx0BKoSsIRs0FsCWmkZy5qGWfBZE8LPes99OgK3X.png')}}" alt="">
</body>
</html>
