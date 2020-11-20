<?php
declare(strict_types=1);

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

    $container['pdo'] = function (ContainerInterface $container) {
        $pdo = new PDO('mysql:host=127.0.0.1; dbname=todo', 'root', 'password');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };

    $container['TaskModel'] = DI\Factory('App\Factories\TaskModelFactory');
    $container['UsersModel'] = DI\Factory('App\Factories\UsersModelFactory');

    $container['LoginCheckMiddleware'] = DI\Factory('App\Factories\LoginCheckMiddlewareFactory');
    $container['UserLoginController'] = DI\Factory('App\Factories\UserLoginControllerFactory');
    $container['UserLogoutController'] = DI\Factory('App\Factories\UserLogoutControllerFactory');

    $container['LoginPageController'] = DI\Factory('App\Factories\LoginPageControllerFactory');
    $container['ActiveTasksController'] = DI\Factory('App\Factories\ActiveTasksControllerFactory');
    $container['CompletedTasksController'] = DI\Factory('App\Factories\CompletedTasksControllerFactory');

    $container['AddTaskController'] = DI\Factory('App\Factories\AddTaskControllerFactory');
    $container['CompleteTaskController'] = DI\Factory('App\Factories\CompleteTaskControllerFactory');
    $container['DeleteTaskController'] = DI\Factory('App\Factories\DeleteTaskControllerFactory');
    $container['EditTaskController'] = DI\Factory('App\Factories\EditTaskControllerFactory');
    $container['UpdateTaskController'] = DI\Factory('App\Factories\UpdateTaskControllerFactory');
    $container['ReopenTaskController'] = DI\Factory('App\Factories\ReopenTaskControllerFactory');

    $containerBuilder->addDefinitions($container);
};
