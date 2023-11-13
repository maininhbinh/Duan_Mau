<?php
require_once './config/App.php';
require_once './modules/autoload/my_autoload.php';

//gán lại mảng config
$config = require('config/config.php');

//sét lại config
App::setConfig($config);

//khởi tạo class my_autoload
new my_autoload();
