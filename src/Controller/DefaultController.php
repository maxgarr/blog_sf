<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function homePage(): Response
    {        
        return $this->render('default/index.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contactPage(): Response
    {
        return $this->render('default/contact.html.twig');
    }

    #[Route('/admin', name: 'admin')]
    public function adminPage(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/blog', name: 'blog', methods: ['GET'])]
    public function blogPage(ArticleRepository $articleRepository): Response
    {
        return $this->render('default/blog.html.twig',[
            'articles' => $articleRepository->findAll(),
        ]);
    }
}
