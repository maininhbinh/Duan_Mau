<?php

namespace Modules\route;

use Middleware\auth;
use Middleware\middleware;

class RouteCollector
{

    // lưu trữ các giá trị được định nghĩa sẵn
    private $routes = [];

    //lưu trữ giá trị trên thanh params
    private $params = [];

    //lưu trữ method đang được sử dụng
    private $httpMethod = '';

    //lưu trữ thanh url đang được sử dugnj
    private $url = '';

    public function __construct()
    {
    }

    //phương thức get
    public function get($route, $handler)
    {
        return $this->addRoute('GET', $route, $handler);
    }

    //phương thức post
    public function post($route, $handler)
    {
        return $this->addRoute('POST', $route, $handler);
    }

    //phương thức sử dụng bất kì
    public function any($route, $handler)
    {
        return $this->addRoute('GET|POST', $route, $handler);
    }

    //add lại các phương thức sẽ sử dụng trong dự án
    public function addRoute($httpMethod, $route, $handler)
    {
        $this->routes[] = [$httpMethod, $route, $handler, $midleware = null];
        return $this;
    }

    //add lại url và method đang được sử dụng
    public function dispatch($httpMethod, $url)
    {
        $this->httpMethod = $httpMethod;
        $this->url = $url;
    }

    //so sánh các giá trị đang được sử dụng 
    public function map()
    {

        //thuộc tính này sẽ trả về true khi các điều kiện đúng
        $checkRoute = false;

        //thuộc tính này được gán lại các routes được đinh nghĩa sẵn 
        $routes = $this->routes;

        //có bao nhiêu route được định nghĩa sẵn sẽ lặp từng đấy lần để so sánh
        foreach ($routes as $route) {

            //destructuring giá trị trong mảng
            list($httpMethod, $route, $handler, $midleware) = $route;

            //nếu không trùng giá trị method thì sẽ continue
            if (strpos($this->httpMethod, $httpMethod) === false) {
                continue;
            }

            if ($route === '*') {
                $checkRoute = true;
            } else if (strpos($route, '{') === false && strpos($route, '}') === false) {

                if (strcmp(strtolower(trim($this->url, '/')), strtolower(trim($route, '/'))) === 0) {
                    $checkRoute = true;
                } else {
                    continue;
                }
            } else {

                $routeParam = array_values(array_filter(explode('/', $route)));
                $requestParams = array_values(array_filter(explode('/', $this->url)));
                $pattern = preg_replace('/{[^}]+}/', '[^/]+', strtolower(trim($route, '/')));
                $match = preg_match(sprintf('~^%s$~', $pattern), strtolower(trim($this->url, '/')));

                if (count($routeParam) == count($requestParams) && $match) {

                    foreach ($routeParam as $index => $item) {

                        if (preg_match('/^{\w+}$/', $item)) {

                            $this->params[] = $requestParams[$index];
                            $checkRoute = true;
                        }
                    }
                } else {

                    continue;
                }
            }


            if ($checkRoute == true) {

                if ($midleware) {
                    $checkMidleware = true;
                    if (!isset(middleware::MAP[$midleware])) {
                        header('location:' . APP_URL);
                    }

                    list($class, $method)  = middleware::MAP[$midleware];
                    (new $class)->$method();
                }

                if (is_callable($handler)) {
                    call_user_func_array($handler, $this->params);
                    return;
                } else if (is_array($handler)) {
                    $this->compieRoute($handler);
                }
            } else {
                continue;
            }

            return;
        }
    }

    public function compieRoute($handler)
    {
        if (count($handler) !== 2) {
            die;
        }

        if (class_exists($handler[0])) {
            $object = new $handler[0];

            if (method_exists($object, $handler[1])) {
                call_user_func_array([$object, $handler[1]], $this->params);
            }
        }
    }

    public function middleware($key)
    {
        $this->routes[array_key_last($this->routes)][3] = $key;
        return $this;
    }

    public function run()
    {
        $this->map();
    }
}
