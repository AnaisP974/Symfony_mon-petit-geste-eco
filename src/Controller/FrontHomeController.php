<?php

namespace App\Controller;

use App\Repository\ArticleBlogRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontHomeController extends AbstractController
{
    #[Route('/', name: 'app_front_home')]
    public function index(ArticleBlogRepository $articleBlogRepository, CategoryRepository $categoryRepository): Response
    {
        $articles = $articleBlogRepository->findBy(['isActive' => true]);

        return $this->render('front_home/index.html.twig', [
            'articles' => $articles,
            // création d'une variable pour dynamiser la navbar
            'current_menu' => 'home',
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
