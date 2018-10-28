<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 28/10/18
 * Time: 16:12
 */

namespace App\Controller\Auth;


use App\Controller\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ConfirmationController extends Controller
{
    private $datas = [];
    private $error = [];

    public function confirmation(RequestInterface $request, ResponseInterface $response)
    {
        $this->datas = $request->getParams();
        r($this->datas);
        $user = $this->db->query('select * from author where author_id=? and author_token=?', [$this->datas['id'], $this->datas['token']]);
        if ($user) {
            $conf = $this->db->query('update author set author_token=null where author_id=? and author_token=?', [$this->datas['id'], $this->datas['token']]);
            $this->flash->addMessage('success', 'Votre compte a été confimé avec success');
            $this->sendMail('Slim Blog:Confirmation de compte', 'potchjust@gmail.com', $user->author_mail, 'Votre compte a été confimé avec success');
            return $this->redirect($response, 'confirmation');
        }
        $response->write('Ce sdsds');
    }
}