<?php

namespace App\Controllers;
session_start();

class UserLoginController
{
    public $model;
    public $renderer;

    /**
     * UserLoginController constructor.
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
        $username = $request->getParsedBody()['username'];
        $password = $request->getParsedBody()['password'];
        $id = $this->model->getUserId($username);
        $hash = $this->model->getUserPassword($username);
        if (password_verify($password, $hash)) {
            $_SESSION['user'] = $id;
            return $response->withHeader('Location','/');
        } else {
            $error = 'Wrong! Try again.';
            return $this->renderer->render($response, 'loginPage.php', ['error' => $error]);
        }
    }
}