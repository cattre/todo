<?php


namespace App\Factories;


use App\Models\TaskModel;
use Psr\Container\ContainerInterface;

class TaskModelFactory
{
    public function __invoke(ContainerInterface $container): TaskModel
    {
        $db = $container->get('pdo');
        return new TaskModel($db);
    }
}