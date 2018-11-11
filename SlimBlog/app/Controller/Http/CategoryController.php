<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 29/10/18
 * Time: 23:31
 */

namespace App\Controller\Http;


use App\Controller\Controller;
use App\Model\Category;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CategoryController extends Controller
{

    public function index(RequestInterface $request, ResponseInterface $response)
    {

        $flash = $this->flash->getMessages();
        $categories = $this->db->query('select * ,author.author_name from category left join author on category.author_id = author.author_id where author.author_id=?',[$this->session->get('user_id')], Category::class,false);
        $this->render($response, 'user/category.twig', compact('flash', 'categories', 'number'));
    }

    public function addcategory(RequestInterface $request, ResponseInterface $response)
    {
        if (!empty($request->getParams())) {
            $add = $this->db->query('insert into category set category_name=?,category.author_id=?', [$request->getParam('category_name'),$this->session->get('user_id')]);
            $this->flash->addMessage('success', 'a été ajouté avec success aux catégories');
            return $this->redirect($response, 'category');
        } else {
            $this->flash->addMessage('error', 'Erreur d\'ajout');
            return $this->redirect($response, 'category');
        }
    }

    public function update(RequestInterface $request, ResponseInterface $response, $args)
    {
        $id = $args['id'];
        $category=$this->db->query('select * from category where category_id=?',[$id],Category::class,true);
        $this->render($response, 'user/upgrade.twig',compact('category'));
    }

    public function upgrade(RequestInterface $request, ResponseInterface $response, $args)
    {
        $id=$args['id'];
        $category=$request->getParam('category_name');
        $this->db->query('update category set category_name=? where category_id=?',[$category,$id],Category::class);
         return   $this->redirect($response,'category');

    }
    public function delete(RequestInterface $request, ResponseInterface $response, $args)
    {
        $id=$args['id'];
        $re=$this->db->query('delete from category where category_id=?',[$id]);
        return   $this->redirect($response,'category');
    }
}