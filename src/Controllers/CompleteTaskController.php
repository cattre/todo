<?php


namespace App\Controllers;


class CompleteTaskController
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
        $taskId = array_key_first($request->getQueryParams());
        $this->model->completeTask($taskId);
        return $response->withHeader('Location','/');
    }
}