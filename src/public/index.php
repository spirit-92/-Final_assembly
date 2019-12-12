<?php

$con = mysqli_connect("mysql",'root','rootpass',"beetroot");
mysqli_set_charset($con,"utf8");

if (mysqli_connect_error()){
    echo "failed to connect MySQL".mysqli_connect_error();
}
echo 'hi22';