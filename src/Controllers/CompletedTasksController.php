<?php


namespace App\Controllers;


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
        $tasks = $this->model->getCompletedTasks();
        return $this->renderer->render($response, 'completed.php', ['tasks' => $tasks]);
    }
}