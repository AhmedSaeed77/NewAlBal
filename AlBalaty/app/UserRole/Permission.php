<?php


namespace App\UserRole;


class Permission
{
    public static function resolveFacade($name){
        return app()[$name];
    }

    public static function __callStatic($method, $arg){
        return self::resolveFacade('Permission')->$method(...$arg);
    }
}
