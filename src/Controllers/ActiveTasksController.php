<?php

namespace App\Controllers;
session_start();


class ActiveTasksController
{
    private $model;
    private $renderer;

    /**
     * ActiveTasksController constructor.
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
        if (isset($_GET['categoryFilter'])) {
            $_SESSION['categoryFilter'] = $_GET['categoryFilter'];
        }
        if (isset($_SESSION['categoryFilter'])) {
            $_SESSION['categoryFilter'] == 'All' ? $filter = '%' : $filter = $_SESSION['categoryFilter'];
        } else {
            $filter = '%';
        }
        $tasks = $this->model->getActiveTasks($filter);
        return $this->renderer->render($response, 'index.php', ['tasks' => $tasks]);
    }


}