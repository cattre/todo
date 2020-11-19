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
        $category = $request->getParsedBody()['category'];
        $due = $request->getParsedBody()['due'] == '' ? null : $request->getParsedBody()['due'];
        $this->model->updateTask($taskId, $task, $category, $due);
        return $response->withHeader('Location','/');
    }
}