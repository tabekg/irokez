<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $posts = $repository->findAll();

        return $this->render('@App/Home/home.html.twig', array(
            'posts' => $posts
        ));
    }

    /**
     * @Route("/authors", name="authors")
     */
    public function authorsAction()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $authors = $repository->findAll();

        return $this->render('@App/Home/authors.html.twig', array(
            'authors' => $authors
        ));
    }

}
