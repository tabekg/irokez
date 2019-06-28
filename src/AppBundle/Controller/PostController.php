<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/post/{id}", name="showPost", requirements={"id"="\d+"})
     */
    public function showAction($id)
    {
        $title = 'Данный материал не найден!';

        $repository = $this->getDoctrine()->getRepository(Post::class);

        $post = $repository->find($id);
        $tags = explode(' ', $post->getTags());

        if ($post) $title = $post->getTitle();

        return $this->render('@App/Post/show.html.twig', array(
            'title' => $title,
            'post' => $post,
            'tags' => $tags,
            'hasAccess' => $this->getUser() && ($this->getUser()->getIsAdmin() || $post->getUserId() === $this->getUser()->getId())
        ));
    }

    /**
     * @Route("/post/{id}/delete", name="deletePost", requirements={"id"="\d+"})
     */
    public function deleteAction($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        if ($post){
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/post/edit")
     */
    public function editAction()
    {
        return $this->render('AppBundle:Post:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/post/create")
     * @param Request $request
     */
    public function createAction(Request $request)
    {
        if (!$this->getUser()) return $this->redirectToRoute('home');

        $em = $this->getDoctrine()->getManager();

        $post = new Post();

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $post->setUserId($this->getUser()->getId());
            $post->setCreatedOn(new \DateTime());
            $post->setTags(strtolower($post->getTags()));

            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('showPost', ['id' => $post->getId()]);
        }

        return $this->render('@App/Post/create.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
