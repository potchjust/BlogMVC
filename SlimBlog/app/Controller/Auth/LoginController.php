<?php

namespace App\Controller\Auth;

use App\Controller\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller
{

    private $error = [];

    public function login(RequestInterface $request, ResponseInterface $response)
    {
        $datas = $request->getParams();

        if (!empty($datas)) {
            $user = $this->db->query('select * from author where author_mail=?', [$datas['login_email']]);
            if ($user) {
                //verification du mot de passe
                if (password_verify($datas['login_pass'], $user->author_pass)) {
                    //si c'est correct  on verifie si le token est null
                    if ($user->author_token === null) {
                        //si le token est null le compte a été confirmé donc on redirige vers le home
                        return $this->redirect($response, 'home');
                    } else {
                        //sinon on dit au gars de vérifier son compte pour verifier son compte
                        $this->error['confirmation'] = 'Ce compte n\' a pas été confimé';
                        $this->flash->addMessage('error', $this->error);
                        return $this->redirect($response, 'login');
                    }
                }
                $this->error['pass_error'] = 'Mot de passe incorrect';
                $this->flash->addMessage('error', $this->error);
                return $this->redirect($response, 'login');
            } //si l'utilisateur n'a pas été trouvé alors il n'existe pas dans la base de donnée
            $this->error['notfound'] = 'Ce compte n\' existe pas dans notre base de donnée';
            $this->flash->addMessage('error', $this->error);
            return $this->redirect($response, 'login');
        }

        if (empty($datas['login_email']) || empty($datas['login_pass'])) {
            $this->error['field'] = 'Veuillez remplir les champs';
            $this->flash->addMessage('error', $this->error);
            return $this->redirect($response, 'login');
        }

    }
}