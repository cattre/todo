<?php

namespace App\Controllers;
session_start();

class UpdateTaskStatusController
{
    private $model;

    /**
     * CompleteTaskController constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        $taskId = array_key_first($request->getParsedBody());
        $task = $this->model->getTask($taskId);
        $task['completed'] == 1 ? $status = 0 : $status = 1;
        $this->model->updateStatus($taskId, $status);
        return $response->withHeader('Location','/');
    }
}