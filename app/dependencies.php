<?php
declare(strict_types=1);
require_once '../../connectDB.php';

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['pdo'] = connectDB('todo');

    $container['TaskModel'] = DI\Factory('App\Factories\TaskModelFactory');
    $container['UsersModel'] = DI\Factory('App\Factories\UsersModelFactory');

    $container['LoginCheckMiddleware'] = DI\Factory('App\Factories\LoginCheckMiddlewareFactory');
    $container['UserLoginController'] = DI\Factory('App\Factories\UserLoginControllerFactory');
    $container['UserLogoutController'] = DI\Factory('App\Factories\UserLogoutControllerFactory');

    $container['LoginPageController'] = DI\Factory('App\Factories\LoginPageControllerFactory');
    $container['DisplayTasksController'] = DI\Factory('App\Factories\DisplayTasksControllerFactory');
    $container['FilterTasksController'] = DI\Factory('App\Factories\FilterTasksControllerFactory');

    $container['AddTaskController'] = DI\Factory('App\Factories\AddTaskControllerFactory');
    $container['UpdateTaskStatusController'] = DI\Factory('App\Factories\UpdateTaskStatusControllerFactory');
    $container['DeleteTaskController'] = DI\Factory('App\Factories\DeleteTaskControllerFactory');
    $container['EditTaskController'] = DI\Factory('App\Factories\EditTaskControllerFactory');
    $container['UpdateTaskController'] = DI\Factory('App\Factories\UpdateTaskControllerFactory');

    $containerBuilder->addDefinitions($container);
};
