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

    public function __construct(Session $session)
    {
        $this->session = $session;
    }
}