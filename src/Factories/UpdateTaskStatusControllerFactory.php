<?php


namespace App\Factories;


use App\Controllers\UpdateTaskStatusController;
use Psr\Container\ContainerInterface;

class UpdateTaskStatusControllerFactory
{
    public function __invoke(ContainerInterface $container): UpdateTaskStatusController
    {
        $model = $container->get('TaskModel');
        return new UpdateTaskStatusController($model);
    }
}