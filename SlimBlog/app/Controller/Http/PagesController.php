<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 15:18
 */

namespace App\Controller\Http;


use App\Controller\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PagesController extends Controller
{
    private $container;

    public function index(RequestInterface $request, ResponseInterface $response)
    {
        r($this->session->get('user_id'));
        $logged = $this->auth->checklogged();
        r($logged);

        $this->render($response, 'index.twig', compact('logged'));
    }

    public function register(RequestInterface $request, ResponseInterface $response)
    {
        $logged = $this->auth->checklogged();
        $flash = $this->flash->getMessages();
        return $this->render($response, 'register.twig', compact('flash'));
    }

    public function confirmation(RequestInterface $request, ResponseInterface $response)
    {
        $logged = $this->auth->checklogged();
        $flash = $this->flash->getMessages();
        $this->render($response, 'conf.twig', compact('flash'));
    }

    public function login(RequestInterface $request, ResponseInterface $response)
    {
        $logged = $this->auth->checklogged();
        $flash = $this->flash->getMessages();

        $this->render($response, 'login.twig', compact('flash'));
    }

    public function home(RequestInterface $request, ResponseInterface $response)
    {
        $logged = $this->auth->checklogged();
        r($this->session->get('user_id'));
        $this->render($response, 'user/index.twig');
    }


}