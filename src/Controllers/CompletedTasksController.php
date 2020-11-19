<?php

namespace App\Controllers;
use http\Env\Request;

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
        $_SESSION['categoryFilter'] = $_GET['categoryFilter'] ?? 'All';
        $_SESSION['categoryFilter'] == 'All' ? $filter = '%' : $filter = $_SESSION['categoryFilter'];
        $tasks = $this->model->getCompletedTasks($filter);
        return $this->renderer->render($response, 'completed.php', ['tasks' => $tasks]);
    }
}