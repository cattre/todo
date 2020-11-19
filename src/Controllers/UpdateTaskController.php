<?php


namespace App\Controllers;


class UpdateTaskController
{
    private $model;

    /**
     * EditTaskController constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        $taskId = $request->getParsedBody()['id'];
        $task = $request->getParsedBody()['task'];
        $due = $request->getParsedBody()['due'];
        $this->model->updateTask($taskId, $task, $due);
        return $response->withHeader('Location','/');
    }
}