<?php

namespace App\Controller;

use App\Entity\BlogArticles;
use App\Form\BlogArticlesType;
use App\Repository\BlogArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/blog/articles")
 */
class BlogArticlesController extends Controller
{
    /**
     * @Route("/", name="blog_articles_index", methods="GET")
     */
    public function index(BlogArticlesRepository $blogArticlesRepository): Response
    {
        return $this->render('blog_articles/index.html.twig', ['blog_articles' => $blogArticlesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="blog_articles_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $blogArticle = new BlogArticles();
        $form = $this->createForm(BlogArticlesType::class, $blogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blogArticle);
            $em->flush();

            return $this->redirectToRoute('blog_articles_index');
        }

        return $this->render('blog_articles/new.html.twig', [
            'blog_article' => $blogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_articles_show", methods="GET")
     */
    public function show(BlogArticles $blogArticle): Response
    {
        return $this->render('blog_articles/show.html.twig', ['blog_article' => $blogArticle]);
    }

    /**
     * @Route("/{id}/edit", name="blog_articles_edit", methods="GET|POST")
     */
    public function edit(Request $request, BlogArticles $blogArticle): Response
    {
        $form = $this->createForm(BlogArticlesType::class, $blogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_articles_edit', ['id' => $blogArticle->getId()]);
        }

        return $this->render('blog_articles/edit.html.twig', [
            'blog_article' => $blogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_articles_delete", methods="DELETE")
     */
    public function delete(Request $request, BlogArticles $blogArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogArticle->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($blogArticle);
            $em->flush();
        }

        return $this->redirectToRoute('blog_articles_index');
    }
}
