<?php


namespace App\Factories;


use App\Models\UsersModel;
use Psr\Container\ContainerInterface;

class UsersModelFactory
{
    public function __invoke(ContainerInterface $container): UsersModel
    {
        $db = $container->get('pdo');
        return new UsersModel($db);
    }
}