<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 15:17
 */

namespace App\Controller;



use Psr\Http\Message\ResponseInterface;


class Controller
{
    private $container;

    public function __construct($container)
    {

        $this->container = $container;
    }

    public function render(ResponseInterface $response,$path,$args=[])
    {
       return $this->container->view->render($response,$path,$args);
    }

    public function __get($name)
    {
      return $this->container->get($name);
    }

    public function redirect($response,$name)
    {
        return $response->withStatus(302)->withHeader('Location',$this->router->pathFor($name));
    }


}