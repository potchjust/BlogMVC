<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 15:01
 */

namespace App;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Auth
{
    /**
     * @var Session
     */
    private $container;
    private $session;
    private $connected=false;
    public function __construct($container)
    {

        $this->container = $container;
    }

    public function checklogged(): bool
    {
        if ($this->container->get('user_id')) {
            return true;
        }
        return false;
    }

    public function logout(RequestInterface $request,ResponseInterface $response)
    {
        session_destroy();
        return $response->withStatus(302)->withHeader('Location', $this->container->router->pathFor('home'));
    }

}