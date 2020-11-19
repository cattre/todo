<?php


namespace App\Factories;


use App\Controllers\AddTaskController;
use Psr\Container\ContainerInterface;

class AddTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): AddTaskController
    {
        $model = $container->get('TaskModel');
        return new AddTaskController($model);
    }
}