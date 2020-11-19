<?php


namespace App\Factories;


use App\Controllers\ActiveTasksController;
use Psr\Container\ContainerInterface;

class ActiveTasksControllerFactory
{
    public function __invoke(ContainerInterface $container): ActiveTasksController
    {
        $model = $container->get('TaskModel');
        $renderer = $container->get('renderer');
        return new ActiveTasksController($model, $renderer);
    }
}