<?php
class my_autoload
{
    function __construct()
    {

        //hàm hổ trợ autoload
        spl_autoload_register([$this, 'autoload']);
    }

    private function autoload($class)
    {
        //lấy ra giá trị được sét trước đó
        $path = App::getConfig()['autoload'];


        //đường dẫn tới file được namespase
        $filePath = $class . '.php';

        //nếu có file đó thì tiến hành require_one
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }
}
