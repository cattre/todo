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
        $task = $request->getParsedBody()['task'];
        $due = $request->getParsedBody()['due'];
        $this->model->addTask($task, $due);
        return $response->withHeader('Location','/');
    }
}