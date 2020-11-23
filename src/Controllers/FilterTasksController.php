<?php


namespace App\Controllers;
session_start();

class FilterTasksController
{

    public function __invoke($request, $response, $args)
    {
        $_SESSION['category'] = $request->getQueryParams()['categoryFilter'] ?? $_SESSION['category'] ?? '%';
        $_SESSION['status'] = $request->getQueryParams()['statusFilter'] ?? $_SESSION['status'] ?? '%';

        return $response->withHeader('Location','/tasks');
    }
}