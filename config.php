<?php
$link = mysqli_connect("localhost","root","","Jackpot_event");

if(!$link){
    die("connect_error".mysqli_connect_error());
}
?>