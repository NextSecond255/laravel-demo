<?php
if (! function_exists('route_class')) {
    /**
     * 将路由名称转换为页面 div class 名称。
     *
     * @return void
     */
    function route_class()
    {
        return str_replace('.', '-', \Route::currentRouteName());
    }
}
