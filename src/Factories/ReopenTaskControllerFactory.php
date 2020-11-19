<?php


namespace App\Factories;


use App\Controllers\ReopenTaskController;
use Psr\Container\ContainerInterface;

class ReopenTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): ReopenTaskController
    {
        $model = $container->get('TaskModel');
        return new ReopenTaskController($model);
    }
}