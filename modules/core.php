<?php

namespace Modules;

trait core
{
    public function view($view, $data = [])
    {
        $view = str_replace('.', '/', $view);

        return include(APP_DIR . "/resources/views/$view.php");
    }
}
