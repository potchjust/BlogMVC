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
        $this->render($response, 'index.twig');
    }

    public function register(RequestInterface $request, ResponseInterface $response)
    {
        // $flash=$this->flash->getMessage('error');

       r(session_status());
        return $this->render($response, 'register.twig', ['flash'=>$flash]);
    }

    public function confirmation(RequestInterface $request, ResponseInterface $response)
    {
        $flash=$this->flash->getMessage('success');
        $this->render($response, 'conf.twig',compact('flash'));
    }

    public function login(RequestInterface $request, ResponseInterface $response)
    {

    }
}