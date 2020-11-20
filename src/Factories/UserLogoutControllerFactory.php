<?php

namespace App\Factories;

use App\Controllers\UserLogoutController;
use Psr\Container\ContainerInterface;

class UserLogoutControllerFactory
{
    public function __invoke(ContainerInterface $container): UserLogoutController
    {
        $renderer = $container->get('renderer');
        return new UserLogoutController($renderer);
    }
}