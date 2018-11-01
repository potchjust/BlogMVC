<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 15:01
 */

namespace App;


class Auth
{
    /**
     * @var Session
     */
    private $session;

    public function __construct(Session $session)
{

    $this->session = $session;
}

    public function checklogged():bool
    {
        if ($this->session->get('user_id')===true)
        {
            return true;

        }
        return false;
    }

}