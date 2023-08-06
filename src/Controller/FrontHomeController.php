<?php

namespace App\Controller;

use App\Services\CartServices;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\ArticleBlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontHomeController extends AbstractController
{
    private $cartServices;
    public function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }
     
    #[Route('/', name: 'app_front_home')]
    public function index(ArticleBlogRepository $articleBlogRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $articles = $articleBlogRepository->findBy(['isActive' => true]);

        return $this->render('front_home/index.html.twig', [
            'articles' => $articles,
            // création d'une variable pour dynamiser la navbar
            'current_menu' => 'home',
            'categories' => $categoryRepository->findAll(),
            'products' => $productRepository->findAll(),
            'cart' => $this->cartServices->getFullCart(),
        ]);
    }
}
