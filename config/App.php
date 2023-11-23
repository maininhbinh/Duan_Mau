<?php
class App
{
    public static $config;
    public static $path;

    static function setConfig($config)
    {

        //sét lại biến config
        self::$config = $config;
    }
    public static function getConfig()
    {

        //trả về biến config
        return self::$config;
    }
}
