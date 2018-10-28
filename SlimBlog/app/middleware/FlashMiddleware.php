<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 23/10/18
 * Time: 21:55
 */

namespace App\middleware;


class FlashMiddleware
{
    private $flash;
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    public function __invoke($request,$response,$next)
    {
       r($this->container);
       return $next($request,$response);
    }
}