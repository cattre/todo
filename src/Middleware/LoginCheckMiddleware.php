<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class LoginCheckMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);

        if (!isset($_SESSION['user'])) {
            return $response->withHeader('Location','/loginPage');
        }
        return $response;
    }
}