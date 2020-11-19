<?php


namespace App\Factories;

use App\Controllers\CompletedTasksController;
use Psr\Container\ContainerInterface;

class CompletedTasksControllerFactory
{
    public function __invoke(ContainerInterface $container): CompletedTasksController
    {
        $model = $container->get('TaskModel');
        $renderer = $container->get('renderer');
        return new CompletedTasksController($model, $renderer);
    }
}