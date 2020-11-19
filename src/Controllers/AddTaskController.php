<?php


namespace App\Controllers;


class AddTaskController
{
    private $model;

    /**
     * ActiveTasksController constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        $task = $request->getQueryParams()['task'];
        $this->model->addTask($task);
        return $response->withHeader('Location','/');
    }
}