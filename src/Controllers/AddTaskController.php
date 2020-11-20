<?php


namespace App\Controllers;
session_start();

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
        if (!isset($_SESSION['user'])) {
            return $response->withHeader('Location','/loginPage');
        }

        $task = $request->getParsedBody()['task'];
        $category = $request->getParsedBody()['category'];
        $due = $request->getParsedBody()['due'] == '' ? null : $request->getParsedBody()['due'];
        $this->model->addTask($task, $category, $due);
        return $response->withHeader('Location','/');
    }
}