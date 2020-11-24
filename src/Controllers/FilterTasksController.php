<?php


namespace App\Controllers;
session_start();

class FilterTasksController
{

    public function __invoke($request, $response, $args)
    {
        $_SESSION['category'] = $request->getQueryParams()['category'] ?? $_SESSION['category'] ?? '%';
//        $_SESSION['status'] = $request->getQueryParams()['status'] ?? $_SESSION['status'] ?? '0';
//        var_dump($_SESSION);
        return $response->withHeader('Location','/tasks');
    }
}