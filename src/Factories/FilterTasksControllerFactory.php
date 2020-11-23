<?php


namespace App\Factories;


use App\Controllers\FilterTasksController;
use Psr\Container\ContainerInterface;

class FilterTasksControllerFactory
{
    public function __invoke(ContainerInterface $container): FilterTasksController
    {
        return new FilterTasksController();
    }
}