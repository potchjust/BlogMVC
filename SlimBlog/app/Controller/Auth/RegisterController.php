<?php

namespace App\Controller\Auth;

use App\Controller\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RegisterController extends Controller
{
    private $errors = [];
    private $redirect = '/';
    private $sucess = [];
    private $datas = [];

    public function register(RequestInterface $request, ResponseInterface $response)
    {

        if (!empty($request->getParams())) {
            $this->datas = $request->getParams();
            if (empty($this->datas['name'])) {
                $this->errors['name'] = 'Le champ nom est invalide';
            }
            if (empty($this->datas['email']) || !filter_var($this->datas['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['mail'] = 'Le champ email est invalide';
            }
            if (empty($this->datas['password']) || strcmp($this->datas['password'], $this->datas['conf_pass'])) {
                $this->errors['password'] = 'Le champ de mot de passe est invalide';
            }
            if (empty($this->errors)) {

                if ($this->findOtherMail($this->datas['email'])) {

                    $this->errors['mailuse'] = 'Ce mail est déja utilisé par un autre utilisateur';
                    $this->flash->addMessage('error', $this->errors);
                    return $this->redirect($response, 'register');
                } else {
                    $password = $this->helpers->hash($this->datas['password']);
                    $token = $this->helpers->token();
                    // $password=password_hash($this->datas['password'],PASSWORD_BCRYPT);

                    $user = $this->db->query('insert into author set author_name=?,author_mail=?,author_pass=?,author_token=?', [$this->datas['name'], $this->datas['email'], $password, $token]);
                    $user_id=$this->pdo->lastInsertId();
                    $this->flash->addMessage('success', 'Thank you ' . $this->datas['name'] . ' for registering to our services we send you aan email.Verify your email for completing your registration ');
                    $this->sendMail('Slim Blog', 'potchjust@gmail.com', $this->datas['email'], "Merci {$this->datas['name']} de vous être inscrit sur notre plateforme.Pour pouvoir accès à nos service veuillez confirmez votre compte en suivant le lien ci-dessous http://localhost:8000/confirm?id=$user_id&token=$token ");
                    return $this->redirect($response, 'register');
                }
            }
            $this->flash->addMessage('error', $this->errors);
            return $this->redirect($response, 'register');
        }
    }

    public function findOtherMail($usermail)
    {
        $user = $this->db->query('select * from author where author_mail=?', [$usermail]);
        if ($user) {
            return true;
        }
        return false;
    }


}