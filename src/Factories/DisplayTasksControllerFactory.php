<?php


namespace App\Factories;


use App\Controllers\DisplayTasksController;
use Psr\Container\ContainerInterface;

class DisplayTasksControllerFactory
{
    public function __invoke(ContainerInterface $container): DisplayTasksController
    {
        $model = $container->get('TaskModel');
        $renderer = $container->get('renderer');
        return new DisplayTasksController($model, $renderer);
    }
}