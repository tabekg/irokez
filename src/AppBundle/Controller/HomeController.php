<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
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
     * @Route("/tags", name="tags")
     */
    public function tagsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = [['id' => 0, 'tag' => 'Tag name']];

        return $this->render('@App/Home/tags.html.twig', array(
            'tags' => $tags
        ));
    }

}
