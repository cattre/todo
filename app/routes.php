<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ActiveTasksController');
    $app->get('/completed', 'CompletedTasksController');
    $app->post('/add', 'AddTaskController');
    $app->post('/complete', 'CompleteTaskController');
    $app->post('/delete', 'DeleteTaskController');
    $app->get('/edit', 'EditTaskController');
    $app->post('/update', 'UpdateTaskController');
    $app->post('/reopen', 'ReopenTaskController');

};
