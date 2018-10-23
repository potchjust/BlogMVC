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

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    public function login($mail,$pass)
    {
        $user=$this->db->query('select * from author where author_mail=? and author_pass=?',[$mail,$pass]);
        if ($user)
        {
          return true;
        }
        return false;
    }
}