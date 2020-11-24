<?php

namespace App\Controllers;
session_start();

class DisplayTasksController
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
        $user = $_SESSION['user'];
        $category = $_SESSION['category'];

        $tasks = $this->model->getTasks($user, $category);
        $count = $this->model->getCompletedTaskCount($user, $category);
        return $this->renderer->render($response, 'index.php', ['tasks' => $tasks, 'count' => $count]);
    }
}