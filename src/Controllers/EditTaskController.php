<?php


namespace App\Controllers;


class EditTaskController
{
    private $model;
    private $renderer;

    /**
     * EditTaskController constructor.
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
        $taskId = array_key_first($request->getQueryParams());
        $tasks = $this->model->getTask($taskId);
        return $this->renderer->render($response, 'edit.php', ['tasks' => $tasks]);
    }
}