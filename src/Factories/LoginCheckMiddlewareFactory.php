<?php


namespace App\Factories;


use App\Middleware\LoginCheckMiddleware;
use Psr\Container\ContainerInterface;

class LoginCheckMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): LoginCheckMiddleware
    {
        return new LoginCheckMiddleware();
    }
}