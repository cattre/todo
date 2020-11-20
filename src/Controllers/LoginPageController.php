<?php

namespace App\Controllers;
session_start();

class LoginPageController
{
    private $renderer;

    /**
     * LoginPageController constructor.
     *
     * @param $renderer
     */
    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        $error = '';
        return $this->renderer->render($response, 'loginPage.php', ['error' => $error]);    }
}