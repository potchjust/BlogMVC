<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 22/10/18
 * Time: 23:05
 */

namespace App;


class Flash
{
    /**
     * @var Session
     */
    private $session;
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(Session $session,\Twig_Environment $twig)
    {
        $this->session = $session;

        $this->twig = $twig;
    }

    public function addMessage($type,$content)
    {
        $this->session->set($type,$content);
    }

    public function getMessage($type)
    {
        return $this->session->get($type);
    }




}