<?php
session_start();
if(isset($_GET['logout'])&&$_GET['logout']=='admin'){
    session_destroy();
    header('Location: /VEGEFOODS/admin');
}
else{
    session_destroy();
header('Location: /VEGEFOODS/');
}