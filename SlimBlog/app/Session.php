<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 22/10/18
 * Time: 22:46
 */

namespace App;


class Session
{
    public function __construct()
    {
        if (session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }

    public function get($key)
    {
        return isset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_unset();
    }
}