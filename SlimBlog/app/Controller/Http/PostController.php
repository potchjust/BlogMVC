<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 01/11/18
 * Time: 15:32
 */

namespace App\Controller\Http;


use App\Controller\Controller;
use App\Model\Category;
use App\Model\Post;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PostController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        $id=$this->session->get('user_id');
        $categories=$this->db->query('select category_name,author.author_name
          from category 
            left join author on category.author_id = author.author_id where author.author_id=?',[$id],Category::class,false);

        $posts = $this->db->query('select posts.post_id,posts.post_name,posts.created_at ,category.category_name ,author.author_name from posts left join category on posts.category_id = category.category_id
 left join author on posts.author_id = author.author_id where  posts.author_id=?',[$id],Post::class,false);

        $this->render($response, 'user/posts.index.twig', compact('posts','categories'));
    }

    public function create(RequestInterface $request, ResponseInterface $response)
    {
        $user_id=$this->session->get('user_id');

        $datas=$request->getParams();//récupération des parametres envoyé via le formulaire
        //recupération des categories concernant l'user actuel
        $categories_db=$this->db->query('select * from category where author_id=?',[$user_id],Category::class,false);



    }

    public function show(RequestInterface $request, ResponseInterface $response, $args)
    {

    }

    public function update(RequestInterface $request, ResponseInterface $response, $args)
    {

    }

    public function upgrade(RequestInterface $request, ResponseInterface $response, $args)
    {

    }

    public function delete(RequestInterface $request, ResponseInterface $response, $args)
    {

    }

}