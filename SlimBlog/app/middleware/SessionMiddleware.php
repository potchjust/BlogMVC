<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 23/10/18
 * Time: 18:49
 */

namespace App\middleware;




use App\Session;
use Slim\Http\Request;
use Slim\Http\Response;

class SessionMiddleware
{
    public function __invoke(Request $request,Response $response,$next)
    {
        if (session_status()===PHP_SESSION_NONE)
        {
           new Session();
        }
        return $next($request,$response);
    }
}