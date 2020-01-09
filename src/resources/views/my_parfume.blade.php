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
    var_dump($parfume[0]->big_img);
    $img = $parfume[0]->big_img;
    var_dump(asset('favicon.ico'));
}
?>
<img src="{{asset('storage/img/Dima/big_icon/vx0BKoSsIRs0FsCWmkZy5qGWfBZE8LPes99OgK3X.png')}}" alt="">
</body>
</html>
