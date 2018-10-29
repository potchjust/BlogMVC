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
     * @var Database
     */
    private $db;

    public function __construct()
    {
    }
    public function chechlogged():bool
    {
        if ($this->session->get('user_id')===true)
        {
            return true;

        }
        return false;
    }

}