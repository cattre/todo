<?php


namespace App\Controllers;


class ReopenTaskController
{
    private $model;

    /**
     * ReopenTaskController constructor.
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
        $this->model->reopenTask($taskId);
        return $response->withHeader('Location','/completed');
    }
}