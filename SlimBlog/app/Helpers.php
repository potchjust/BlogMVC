<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 25/10/18
 * Time: 14:19
 */

namespace App;


class Helpers
{

    public function hash($password):String
    {
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public function token(): string
    {
        return bin2hex(random_bytes(10));
    }


}