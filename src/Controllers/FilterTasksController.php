<?php


namespace App\Controllers;
session_start();

class FilterTasksController
{

    public function __invoke($request, $response, $args)
    {
        $_SESSION['category'] = $request->getQueryParams()['category'] ?? $_SESSION['category'] ?? '%';
        return $response->withHeader('Location','/tasks');
    }
}