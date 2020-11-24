<?php

namespace App\Controllers;
session_start();

class UserLogoutController
{
    public $renderer;

    /**
     * UserLoginController constructor.
     *
     * @param $renderer
     */
    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        session_destroy();
        $error = '';
        return $this->renderer->render($response, 'loginPage.php', ['error' => $error]);
    }
}