<?php

namespace App\Controllers;
session_start();

class DisplayTasksController
{
    private $model;
    private $renderer;

    /**
     * ActiveTasksController constructor.
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
        $user = $_SESSION['user'];
        $category = $_SESSION['category'];
        $status = $_SESSION['status'];

//        if (isset($_GET['categoryFilter'])) {
//            $_SESSION['categoryFilter'] = $_GET['categoryFilter'];
//        }
//
//        $category = '%';
//        if (isset($_SESSION['categoryFilter']) && $_SESSION['categoryFilter'] != 'All') {
//            $category = $_SESSION['categoryFilter'];
//        }
//
//        $status = 0;
//        if ($_SESSION['statusFilter'] = '1') {
//            $status = '%';
//        }

        $tasks = $this->model->getTasks($user, $status, $category);
        return $this->renderer->render($response, 'index.php', ['tasks' => $tasks]);
    }


}