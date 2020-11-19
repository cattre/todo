<?php


namespace App\Controllers;


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
        $tasks = $this->model->getActiveTasks();
        return $this->renderer->render($response, 'index.php', ['tasks' => $tasks]);
    }


}