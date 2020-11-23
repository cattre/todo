<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/loginPage', 'LoginPageController');
    $app->get('/', 'FilterTasksController')->add('LoginCheckMiddleware');
    $app->get('/tasks', 'DisplayTasksController')->add('LoginCheckMiddleware');
    $app->get('/completed', 'CompletedTasksController')->add('LoginCheckMiddleware');

    $app->post('/login', 'UserLoginController');
    $app->post('/logout', 'UserLogoutController');

    $app->post('/add', 'AddTaskController')->add('LoginCheckMiddleware');
    $app->post('/toggleStatus', 'UpdateTaskStatusController')->add('LoginCheckMiddleware');
    $app->post('/delete', 'DeleteTaskController')->add('LoginCheckMiddleware');
    $app->get('/edit', 'EditTaskController')->add('LoginCheckMiddleware');
    $app->post('/update', 'UpdateTaskController')->add('LoginCheckMiddleware');
    $app->post('/reopen', 'ReopenTaskController')->add('LoginCheckMiddleware');

    $app->get('/categoryFilter', 'FilterTasksController')->add('LoginCheckMiddleware');
    $app->get('/statusFilter', 'FilterTasksController')->add('LoginCheckMiddleware');
    $app->get('/filterCompleted', 'CompletedTasksController')->add('LoginCheckMiddleware');

};
