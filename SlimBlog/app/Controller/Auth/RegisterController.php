<?php

namespace App\Controller\Auth;

use App\Controller\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RegisterController extends Controller
{
    private $errors=[];
    private $redirect='/';

    public function register(RequestInterface $request,ResponseInterface $response)
    {

      if (!empty($request->getParams()))
      {
          $datas=$request->getParams();
          if (empty($datas['name']))
          {
             $this->errors['name']='Le champ nom est invalide';
          }
          if (empty($datas['email']) || !filter_var($datas['email'],FILTER_VALIDATE_EMAIL))
          {
             $this->errors['mail']='Le champ email est invalide';
          }
          if (empty($datas['password']) || strcmp($datas['password'],$datas['conf_pass']))
          {
             $this->errors['mail']='Le champ mail est invalide';
          }
          if (empty($this->errors))
          {
              $user=$this->db->query('insert into author set author_name=?,author_mail=?,author_pass=?',[$datas['name'],$datas['email'],$datas['password']]);
            return $this->redirect($response,'confirmation');
          }

          return $this->redirect($response,'register');

      }

    }
}