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

        //cắt chuỗi namespase
        $parts = explode('\\', $class);

        //lấy ra giá trị cuối trong mảng
        $className = end($parts);

        //cắt chuỗi trùng nhau
        $pathName = str_replace($className, '', $class);

        //đường dẫn tới file được namespase
        $filePath = $path . '\\' . $pathName . $className . '.php';

        //nếu có file đó thì tiến hành require_one
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }
}
