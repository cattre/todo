<?php

namespace App\Factories;

use App\Controllers\UserLoginController;
use Psr\Container\ContainerInterface;

class UserLoginControllerFactory
{
    public function __invoke(ContainerInterface $container): UserLoginController
    {
        $model = $container->get('UsersModel');
        $renderer = $container->get('renderer');
        return new UserLoginController($model, $renderer);
    }
}