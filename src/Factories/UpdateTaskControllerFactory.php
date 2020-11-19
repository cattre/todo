<?php


namespace App\Factories;


use App\Controllers\UpdateTaskController;
use Psr\Container\ContainerInterface;

class UpdateTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): UpdateTaskController
    {
        $model = $container->get('TaskModel');
        return new UpdateTaskController($model);
    }
}