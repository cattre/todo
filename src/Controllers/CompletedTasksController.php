<?php

namespace App\Controllers;
session_start();

class CompletedTasksController
{
    private $model;
    private $renderer;

    /**
     * CompletedTasksController constructor.
     *
     * @param $model
     * @param $renderer
     */
    public function __construct($model, $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        if (!isset($_SESSION['user'])) {
            return $response->withHeader('Location','/loginPage');
        } else {
            $user = $_SESSION['user'];
        }

        if (isset($_GET['categoryFilter'])) {
            $_SESSION['categoryFilter'] = $_GET['categoryFilter'];
        }
        if (isset($_SESSION['categoryFilter']) && $_SESSION['categoryFilter'] != 'All') {
            $filter = $_SESSION['categoryFilter'];
        } else {
            $filter = '%';
        }
        $tasks = $this->model->getCompletedTasks($user, $filter);
        return $this->renderer->render($response, 'completed.php', ['tasks' => $tasks]);
    }
}