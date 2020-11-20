<?php

namespace App\Controllers;
session_start();

class DeleteTaskController
{
    private $model;

    /**
     * DeleteTaskController constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        if (!isset($_SESSION['user'])) {
            return $response->withHeader('Location','/loginPage');
        }

        $taskId = array_key_first($request->getParsedBody());
        $this->model->deleteTask($taskId);
        return $response->withHeader('Location','/completed');
    }
}