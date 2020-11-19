<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ActiveTasksController');
    $app->get('/completed', 'CompletedTasksController');
    $app->get('/add', 'AddTaskController');
    $app->get('/complete', 'CompleteTaskController');
    $app->get('/delete', 'DeleteTaskController');
    $app->get('/edit', 'EditTaskController');
    $app->get('/update', 'UpdateTaskController');
    $app->get('/reopen', 'ReopenTaskController');

};
