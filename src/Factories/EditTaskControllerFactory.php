<?php


namespace App\Factories;


use App\Controllers\EditTaskController;
use Psr\Container\ContainerInterface;

class EditTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): EditTaskController
    {
        $model = $container->get('TaskModel');
        $renderer = $container->get('renderer');
        return new EditTaskController($model, $renderer);
    }
}